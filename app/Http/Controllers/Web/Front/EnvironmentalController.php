<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\EnvironmentalRequestController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EnvironmentalController extends Controller
{
    private $environmentalRequestController;
    private $utilityController;

    public function __construct()
    {
        $this->environmentalRequestController = new EnvironmentalRequestController();
        $this->utilityController = new UtilityController();
    }

    public function index()
    {
        $is_active = 1;
        return view('frontsite.pages.environmentalRequest.enquiry.index', compact('is_active'));
    }

    public function handleCreateRequest(Request $request)
    {
        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->environmentalRequestController->store($request);
        if (!$response['status']) {

            return back()->withInput()->withErrors($response['data']['validation_errors'] ?? []);
        }
        return back()->with('success', 'تم ارسال طلبك بنجاح');
    }

}
