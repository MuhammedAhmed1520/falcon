<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use \App\Http\Controllers\Api\CertificateController as ApiCertificateController;
use App\Http\Controllers\Controller;
use SoapClient;


class IndustrialController extends Controller
{
    //
    private $certificateController;
    private $utilityController;

    public function __construct()
    {
        $this->certificateController = new ApiCertificateController();
        $this->utilityController = new UtilityController();
    }

    public function index(Request $request)
    {
        $is_active = 1;
        return view('frontsite.pages.Industrial.enquiry.index', compact('is_active'));
    }


    public function store(Request $request)
    {

        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $this->validate($request, [
            'req_no' => 'required',
            'ssn' => 'required|nullable|numeric|digits:12',
        ], [
            'ssn.required' => 'مطلوب',
        ]);
        $url = 'http://industrial.epa.org.kw:7001/soa-infra/services/default/EPA_INDUSTRIAL_REQUEST_STATUS!1.0*soa_383cb823-690f-41eb-8992-d3f07e25b567/GetRequestStatusSOAP?WSDL';
        $client = new SoapClient($url);


        $input = new \stdClass();
        $input->PAI_REQ_NO = $request->get('req_no');//"450236";
        $input->CIVIL_ID = $request->get('ssn');//"282121200648";

        $data = $client->execute($input);
        $result = $data->REQUEST_STATUS;

        // echo($result);
        // $result = 'تمت الموافقة على طلبك شكرا';
        return back()->with('result_data', ['result' => $result, 'req_no' => $request->get('req_no'), 'ssn' => $request->get('ssn')]);
    }

}
