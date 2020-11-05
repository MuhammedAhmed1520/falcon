<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\VisitReserveController as VisitReserveCTRL;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VisitReserveController extends Controller
{
    private $visitReserveCTRL;
    private $utilityController;

    public function __construct()
    {
        $this->visitReserveCTRL = new VisitReserveCTRL();
        $this->utilityController = new UtilityController();
    }

    public function index()
    {
        $is_active = 1;
        return view('frontsite.pages.visitReserve.enquiry.index', compact('is_active'));
    }

    public function handleCreateRequest(Request $request)
    {
        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->visitReserveCTRL->store($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors'] ?? []);
        }
        return back()->with('success', 'سيتم مراجعة طلبك فى اقرب وقت ورسال رسالة الى البريد الالكترونى الخاص بكم لاستكمال الطلب والدفع');
    }

}
