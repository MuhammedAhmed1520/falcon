<?php
namespace App\Modules\Payment;

use \App\Models\Payment as PaymentModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

/**
 * Class Payment
 * @package App\Modules\Payment
 */
class Payment
{
    use PaymentHelper;
    /**
     * Instance Of Payment Model
     */
    private $paymentModel;

    /**
     * Payment constructor.
     */
    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
    }

    /**
     * @param array $data
     * @param $type
     * @param int $sendNotifyOrNot
     * @return array|null
     */
    public function create(array $data,$type,$sendNotifyOrNot = 1)
    {
        if ($type == 1){

            $data['status'] = 1;
            $data['user_id'] = auth('web')->user()->id ?? null;
            $pay = $this->paymentModel->updateOrCreate(['paymentable_id' => $data['paymentable_id'] , 'paymentable_type'=>$data['paymentable_type']],$data);
            $payed = $pay->paymentable;
            $payed->payed_at = Carbon::now()->format('Y-m-d H:i:s');
            $payed->save();

        }else{
            $data['token'] = strtoupper(str_random(100));
            $data['link'] = url('/').'/api/knet/'.$data['token'];
            $pay = $this->paymentModel->updateOrCreate(['paymentable_id' => $data['paymentable_id'] , 'paymentable_type'=>$data['paymentable_type']],$data);

//            $pData = $this->preparePayReason($pay);
////            dd($pData);
//            $mailData['to'] = $data['email'];
//            $mailData['content'] = $pData;
//            $mailData['template'] = 'mails.knet-payment';

        }
        if($pay){
            $pay->makeHidden(['paymentable']);
            return return_msg(true,"Payment Inserted Successfully",compact('pay'));
        }
        return return_msg(false,"Payment Does not Inserted Successfully");
    }

    /**
     * @param $token
     * @param $data
     * @param $status
     * @return array|null
     */
    public function updateStatus($token,$data,$status)
    {
        $pay = $this->paymentModel->whereToken($token)->first();
        if (!$pay){
            return return_msg(false,"Not Found");
        }
        $callBackLink = $pay['callback'];
        if($pay->status == 1){
            return return_msg(true,"Payment Updated Successfully",compact('callBackLink'));
        }

        //Save Knet Response
        $pay->knet()->updateOrCreate(['pay_id'=>$pay['id']],$this->prepareData($data));

        if($status){
            // Update status
            $pay->status = 1;
            $pay->save();

            // Update Morph Relation Payed At
            $payed = $pay->paymentable;
            $payed->paid_at = Carbon::now()->format('Y-m-d H:i:s');
            $payed->save();

//            $this->updateMorph($pay);

//            $mailData['to'] = $pay['email'];
//            $mailData['content'] = $data;
//            $mailData['template'] = 'mails.success-knet';
//            send_email($mailData);

        }

        return return_msg(true,"Payment Updated Successfully",compact('callBackLink'));
    }

    /**
     * @param $token
     * @return array|null
     */
    public function findByToken($token){
        $pay = $this->paymentModel->whereToken($token)->first();
        if (!$pay){
            return return_msg(false,"Not Found");
        }
        return return_msg(true,"Payment Updated Successfully",compact('pay'));
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function prepareData($data){
        $pData['payment_id'] = $data['paymentid'] ?? null;
        $pData['result'] = $data['result'] ?? null;
        $pData['auth'] = $data['auth'] ?? null;
        $pData['avr'] = $data['avr'] ?? null;
        $pData['ref'] = $data['ref'] ?? null;
        $pData['tran_id'] = $data['tranid'] ?? null;
        $pData['post_date'] = $data['postdate'] ?? null;
        $pData['track_id'] = $data['trackid'] ?? null;
        $pData['amount'] = $data['amt'] ?? null;
        $pData['auth_code'] = $data['authRespCode'] ?? null;
        return $pData;
    }

    protected function preparePayReason($pay)
    {
        $data = [];
        $data['name'] = $pay['name'] ?? null;
        $data['email'] = $pay['email'] ?? null;
        $data['phone'] = $pay['phone'] ?? null;
        $data['cost'] = $pay['cost'] ?? null;
        $data['status'] = $pay['status'] ?? null;
        $data['link'] = $pay['link'] ?? null;
        $data['callback'] = $pay['callback'] ?? null;
        $data['check_info'] = $pay['check_info'] ?? null;
        $data['paymentable_type'] = $pay['paymentable_type'] ?? null;
        $data['paymentable_id'] = $pay['paymentable_id'] ?? null;

        if($pay['paymentable_type'] == TenderBuyer::class ){

            $data['content'] = "الخاصة بشراء الممارسة" ;
        }elseif ($pay['paymentable_type'] == TenderCompanySubscription::class ){

            $data['content'] = "الخاصة بالاشتراك السنوى" ;
        }elseif ($pay['paymentable_type'] == Violation::class ){

            $data['content'] = "الخاصة بالمخالفات" ;
        }elseif ($pay['paymentable_type'] == ViolationCertificate::class ){
            $data['content'] = "الخاصة بطلب شهادة بعدم وجود مخالفات بيئية" ;
        }elseif ($pay['paymentable_type'] == VisitReserve::class ){
            $data['content'] = "الخاصة بتصريح دخول محمية الجهراء" ;
        }
        else{
            $data['content'] = "" ;
        }
        return $data;
    }

}
