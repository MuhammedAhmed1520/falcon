<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\Tender\BuyerController;
use App\Http\Controllers\Api\Tender\CompanyController;
use App\Http\Controllers\Api\UtilityController;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViolationController extends Controller
{
    private $utility;
    private $violation;

    public function __construct()
    {
        $this->utility = new UtilityController();
        $this->violation = new \App\Http\Controllers\Api\ViolationController();
    }

    public function index()
    {
        $categories = $this->utility->getCategory()['data']['categories'] ?? [];
        $actions = $this->utility->getActions()['data']['actions'] ?? [];
        return view('frontsite.pages.violation.enquiry.index', compact('categories', 'actions'));
    }

    public function handleViolationEnquiry(Request $request)
    {

        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $this->validate($request, [
            'category_id' => 'required',

            'ssn' => 'required_if:category_id,1|nullable|numeric|digits:12',
        ], [
            'ssn.required_if' => 'مطلوب',
        ]);

        return redirect()->route('violationEnquiryGetData', $request->only(['category_id', 'ssn', 'type', 'data']));

    }

    public function getEnquiryData(Request $request)
    {
        $response = $this->violation->enQuery($request);
        $violations = collect([]);

        if (!$response['status']) {
            return back()->with('error', 'ﻻ توجد بيانات خاصه بهذا الرقم');
        }
        $violations = $response['data']['violations'];
        return view('frontsite.pages.violation.enquiry_view.index', compact('violations'));
    }

    public function getEnquiryPayViolation(Request $request, $id)
    {
        $violation = $this->violation->show($id)['data']['violation'] ?? null;

        if (!$violation) {
            return back()->with('error', 'ﻻ توجد بيانات');
        }

        return view('frontsite.pages.violation.payment.index', compact('violation'));
    }

    public function handleEnquiryPayViolation(Request $request)
    {

        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }


        $response = $this->violation->pay($request);
//        return $response;
        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            $paid = $errors['check_info'] ?? [];
            if (count($paid) > 0) {
                return back()->with('error', 'غير مسموح بسداد المخالفة حاليا برجاء مراجعة المسئول');
            }
            return back()->withErrors($errors)->withInput();
        }

        $link = $response['data']['pay']['link'] ?? null;
        if (!$link) {
            return back()->with('error', ' لم يتم انشاء الرابط');
        }

        return redirect($link);
        // return back()->with('success', 'تم انشاء رابط الدفع');
    }
}
