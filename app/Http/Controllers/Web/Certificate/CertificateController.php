<?php

namespace App\Http\Controllers\Web\Certificate;

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
        $page_title = 'ALL Certificates';
        $response = $this->certificateController->index($request);
        $certificates = $response['data']['requests'] ?? [];
        $certificates = custom_paginate($certificates);
        $status = $this->utilityController->getStatus('certificate')['data']['status'] ?? [];
        $reasons = $this->utilityController->getReason()['data']['reason'] ?? [];
        $parties = $this->utilityController->getParty()['data']['party'] ?? [];

        return view('pages.certificate.all.index', compact('certificates', 'page_title', 'status', 'reasons', 'parties'));
    }


    public function edit(Request $request, $id)
    {

        $page_title = 'ALL Certificates';
        $response = $this->certificateController->findAdmin($id);
        $certificate = $response['data']['request'] ?? null;

        if (!$certificate) {
            return back()->with('error', __('violation.error'));
        }

        $status = $this->utilityController->getStatus('certificate-edit')['data']['status'] ?? [];
        return view('pages.certificate.edit.index', compact('certificate', 'page_title', 'status'));
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);

        $response = $this->certificateController->updateStatus($request);

        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allCertificate')->with('success', __('violation.edit_success'));
    }

    public function getCertification(Request $request, $id)
    {
        $page_title = 'Show Certificates';
        $response = $this->certificateController->findAdmin($id);
        $certificate = $response['data']['request'] ?? null;

        if (!$certificate) {
            return back()->with('error', __('violation.error'));
        }
        return view('pages.certificate.certificate_form', compact('certificate', 'page_title'));
    }

    public function approve(Request $request)
    {
        return $this->certificateController->updateStatus($request);
    }
    public function delete(Request $request)
    {
        return $this->certificateController->destroy($request->id);
    }

    public function getPayment(Request $request, $id)
    {
        $page_title = 'Get Certificate Payment';
        $response = $this->certificateController->findAdmin($id);
        $certificate = $response['data']['request'] ?? null;

        if (!$certificate) {
            return back()->with('error', __('violation.error'));
        }

        return view('pages.certificate.payment.index', compact('certificate', 'page_title'));
    }
}
