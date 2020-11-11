<?php

namespace App\Http\Controllers\Api;

use App\Knet\KnetGateway;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Payment\Payment as PaymentPresenter;

/**
 * Class PaymentController
 * @package App\Http\Controllers\Api
 */
class PaymentController extends Controller
{
    /**
     * Instance Of Payment Presenter
     */
    protected $paymentPresenter;
    protected $knetGateway;

    /**
     * PaymentController constructor.
     */
    public function __construct()
    {
        $this->paymentPresenter = new PaymentPresenter();
        // $this->knetGateway = new KnetGateway();
    }


    public function pay($token)
    {
        $pay = $this->paymentPresenter->findByToken($token);
        if(!$pay['status']){
            return view('payment.error');
        }


        $knet = $this->getObjectOfKnet($pay['data']['pay']['paymentable_type']);
        if($pay['data']['pay']['status'] !=  1){
            $price = $pay['data']['pay']['cost'];

            $url = $pay['data']['pay']['callback'] ?? "t";
            // Handle Knet Link
            $knet->setReqAmount($price);
            $knet->setReqUdf1($token);
            $knet->setReqUdf2("test");
            $knet->setReqUdf3("test");
            $knet->setReqUdf4("test");
            $knet->setReqUdf5("test");
            $link = $knet->handleKnetLink();
//            dd($link);
            return redirect($link);
        }
        $pay = $pay['data']['pay'];
        $data['ErrorText'] = "Already Paid";
        $data['trackid'] =$pay['knet_data']['track_id'];
        $data['paymentid'] =$pay['knet_data']['payment_id'];
        $data['amt'] =$pay['knet_data']['amount'];
        return view('payment.knet-error',compact('data'));
        // return return_msg(false,"Already Paid");
    }



    public function handleResponse(Request $request){

        $knet = $this->getObjectOfKnet();
        $link = $knet->handleResponse($request->all());
        $query_str = parse_url($link, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        $data = $query_params;
        // return $data;
        // dd($data);
        if($data['ErrorText'] ?? null){
            return view('payment.knet-error',compact('data'));
        }

        if($data['result'] == "CAPTURED"){
            // dd("dd");
//             Update Payment Status
            $response = $this->paymentPresenter->updateStatus($data['udf1'],$data,true);
            if ($response['status']){
                $data ['callBackLink'] = $response['data']['callBackLink'] ?? null;
                return view('payment.knet-wait',compact('data'));
            }
//            return $update;
        }else{

            //Error Payment
            $response = $this->paymentPresenter->updateStatus($data['udf1'],$data,false);
            // dd($response);
            if ($response['status']){
                $data ['callBackLink'] = $response['data']['callBackLink'] ?? null;
                return view('payment.knet-wait',compact('data'));
            }
            return $response;
        }
    }

    public function handleResponseTender(Request $request){

        $knet = $this->getObjectOfKnet("tender");
        $link = $knet->handleResponse($request->all());
        $query_str = parse_url($link, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        $data = $query_params;
        // return $data;
        if($data['ErrorText'] ?? null){
            return view('payment.knet-error',compact('data'));
        }
        if($data['result'] == "CAPTURED"){
//             Update Payment Status
            $response = $this->paymentPresenter->updateStatus($data['udf1'],$data,true);
            if ($response['status']){
                $data ['callBackLink'] = $response['data']['callBackLink'] ?? null;
                return view('payment.knet-wait',compact('data'));
            }
//            return $update;
        }else{

            //Error Payment
            $response = $this->paymentPresenter->updateStatus($data['udf1'],$data,false);
            if ($response['status']){
                $data ['callBackLink'] = $response['data']['callBackLink'] ?? null;
                return view('payment.knet-wait',compact('data'));
            }
            return $response;
        }
    }

    protected function getObjectOfKnet($type = 'app\models\violation')
    {

        if(strtolower($type) == 'app\models\violation'){
            return new KnetGateway(getConfig("ViolationTransportalId"),getConfig("ViolationTransportalPassword"),getConfig("ViolationTermResourceKey"),url('/api/handle-response'));
        }

        return new KnetGateway(getConfig("TenderTransportalId"),getConfig("TenderTransportalPassword"),getConfig("TenderTermResourceKey"),url('/api/handle-response-tender'));

    }

}
