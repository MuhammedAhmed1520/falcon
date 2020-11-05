<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\UtilityController;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ViolationController;

class ViolationEnqiryController extends Controller
{
    private $utility;
    private $violation;

    public function __construct()
    {
        $this->utility = new UtilityController();
        $this->violation = new ViolationController();
    }

    public function index()
    {
        $categories = $this->utility->getCategory()['data']['categories'] ?? [];
        $actions = $this->utility->getActions()['data']['actions'] ?? [];
        return view('pages.violation.enquiry.enquiry.index', compact('categories', 'actions'));
    }

    public function handleViolationEnquiry(Request $request)
    {
        // $request->request->add(['g-recaptcha-response'=>'test data']);
        $this->validate($request, [
            'category_id' => 'required',

            'ssn' => 'required_if:category_id,1|nullable|numeric|digits:12',
            'g-recaptcha-response' => 'required|recaptcha'
        ],
            [
                'ssn.required_if' => 'مطلوب',
                'g-recaptcha-response.required' => 'التحقيق مطلوب',
                'g-recaptcha-response.recaptcha' => 'التحقق غير سليم',
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
        return view('pages.violation.enquiry.enquiry_view.index', compact('violations'));
    }

    public function getEnquiryPayViolation(Request $request, $id)
    {
        $violation = $this->violation->show($id)['data']['violation'] ?? null;

        if (!$violation) {
            return back()->with('error', 'ﻻ توجد بيانات');
        }

        return view('pages.violation.enquiry.payment.index', compact('violation'));
    }

    public function handleEnquiryPayViolation(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|recaptcha'
        ],
            [
                'g-recaptcha-response.required' => 'التحقيق مطلوب',
                'g-recaptcha-response.recaptcha' => 'التحقق غير سليم',
            ]);
        $response = $this->violation->pay($request);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            $paid = $errors['check_info'] ?? [];
            if (count($paid) > 0) {
                return back()->with('error', 'غير مسموح بسداد المخالفة حاليا برجاء مراجعة المسئول');
            }
            return back()->withErrors($errors)->withInput();
        }

        $link = $response['data']['pay']['link'] ?? null;
        if(!$link){
            return back()->with('error', ' لم يتم انشاء الرابط');
        }

        return redirect($link);
        // return back()->with('success', 'تم انشاء رابط الدفع');
    }
}
