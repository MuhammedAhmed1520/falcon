<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use \App\Http\Controllers\Api\CertificateController as ApiCertificateController;
use App\Http\Controllers\Controller;


class CertificateController extends Controller
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
        return view('frontsite.pages.certificate.enquiry.filter',compact('is_active'));
    }

    public function create(Request $request)
    {
        $is_active = 2;
        $party = $this->utilityController->getParty()['data']['party'];
        $reason = $this->utilityController->getReason()['data']['reason'];
        return view('frontsite.pages.certificate.enquiry.create', compact('party', 'reason', 'is_active'));
    }

    public function store(Request $request)
    {
        $validator = captcha_helper($request->all());
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }
        $response = $this->certificateController->store($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        $id = $response['data']['request']['id'];
//        return back()->with('info', __('violation.add_success') . ' رقم الطلب: ' . $id);
        return back()->with('info',  'تم رفع الطلب وسيتم مراجعته من قبل الهيئة العامة للبيئة فى ظل 3 ايام عمل || رقم الطلب :: ' . $id);
    }

    public function findBy(Request $request_)
    {
        $validator = captcha_helper($request_->all());
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->certificateController->findBy($request_);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        $request = $response['data']['request'] ?? null;
        return redirect()->route('show-certificate',['id'=>$request['id']]);

//        return view('frontsite.pages.certificate.enquiry.index', compact('request'));
    }
    public function find($id)
    {
        $response = $this->certificateController->show($id);

        if (!$response['status']) {
            if ($response['data']['validation_errors'] ?? null) {
                return back()->withErrors($response['data']['validation_errors'])->withInput();
            }
            return back();
        }
        $request = $response['data']['request']?? null;
        return view('frontsite.pages.certificate.enquiry.index', compact('request'));
    }

    public function edit($id)
    {
        $is_active = 2;
        $party = $this->utilityController->getParty()['data']['party'];
        $reason = $this->utilityController->getReason()['data']['reason'];
        $response = $this->certificateController->show($id);

        if (!$response['status']) {
            if ($response['data']['validation_errors'] ?? null) {
                return back()->withErrors($response['data']['validation_errors'])->withInput();
            }
            return back();
        }
        $request = $response['data']['request'] ?? null;
        return view('frontsite.pages.certificate.enquiry.edit', compact('request', 'party', 'reason', 'is_active'));
    }

    public function update(Request $request, $id)
    {
        $validator = captcha_helper($request->all());
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }
        $response = $this->certificateController->update($request, $id);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return back()->with('info', __('violation.add_success'));


    }


}
