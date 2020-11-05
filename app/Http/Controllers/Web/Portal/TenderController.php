<?php

namespace App\Http\Controllers\Web\Portal;

use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\Tender\BuyerController;
use App\Http\Controllers\Api\Tender\CompanyController;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenderController extends Controller
{
    private $tender_company;
    private $buyer;

    public function __construct()
    {
        $this->tender_company = new CompanyController();
        $this->buyer = new BuyerController();
    }

    public function handleTenderRegisterCompany(Request $request)
    {
        // return $request->all();
        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->tender_company->storeWithFiles($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        $code = $response['data']['company']['tender_company']['reference_code'] ?? '';

        // if ($code) {
        //     return redirect()->route('frontTenderCompanyUpdateFiles', ['code' => $code]);
        // }
        
        $message = 'شكرا لتسجيل الشركة، الرمز المرجعي الخاص بالشركة هو ('.$code.') يرجى الاحتفاظ به للمراجعة لاحقا والاستعلام عن حالة الشركة
سيتم ارسال بريد الكتروني فور التحقق من كافة بيانات الشركة ولكي تتمكن من دفع الرسوم';

        return back()->with('info',$message);
        
//        return back()->with('info', __('violation.add_success') . ' كود الشركة: ' . $code);
    }

    public function handleTenderCompanyEnquiry(Request $request, $type)
    {

        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        if ($type == 'files') {
            $response = $this->tender_company->findByReferenceCode($request->reference_code);

            if (!$response['status']) {
                return back()->with('error', __('violation.error'));
            }
            $code = $response['data']['company']['reference_code'] ?? null;

            if (!$code) {
                return back()->with('error', __('violation.error'));
            }
            return redirect()->route('frontTenderCompanyUpdateFilesPortal', ['code' => $code]);
        }


        if ($type == 'status') {
            $response = $this->tender_company->findByReferenceCode($request->reference_code);

            if (!$response['status']) {
                return back()->with('error', __('violation.error'));
            }
            $code = $response['data']['company']['reference_code'] ?? null;
            
            if (!$code) {
                return back()->with('error', __('violation.error'));
            }
            return redirect()->route('frontTenderCompanyStatusPortal', ['code' => $code]);
        }


        if ($type == 'subscriptionPay') {

            $code = $request->reference_code;
            $response = $this->tender_company->payForThisYearByReferenceCode($code);

            if (!$response['status']) {
                return back()->withErrors($response['data']['validation_errors'])->withInput();
            }

            $link = $response['data']['payment']['link'] ?? null;

            if (!$link) {
                return back()->with('error', __('violation.error'));
            }

            return redirect($link);
        }

        return back()->with('error', __('violation.error'));
    }
    
    public function subscriptionPay(Request $request , $code){
        
        $response = $this->tender_company->payForThisYearByReferenceCode($code);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        $link = $response['data']['payment']['link'] ?? null;

        if (!$link) {
            return back()->with('error', __('violation.error'));
        }

        return redirect($link);
    }

    public function updateCompanyFiles(Request $request, $code)
    {
        $response = $this->tender_company->uploadFiles($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        return back()->with('info', __('violation.add_success'));

    }

    public function handleTenderFilePayment(Request $request)
    {

        $request->request->add(['callback' => url()->previous()]);


        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->buyer->store($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        $link = $response['data']['pay']['link'] ?? null;

        if (!$link) {
            return back()->with('error', __('violation.error'));
        }

        return redirect($link);
    }

    public function handleTenderPostponeRequest(Request $request)
    {

        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->buyer->extendClosingDateOrder($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function handleTenderResetCodeByMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $validator = captcha_helper($request->all());

        if ($validator->fails()) {

            return back()->withInput()->withErrors($validator->getMessageBag()->getMessages());
        }

        $response = $this->tender_company->forgetReferenceCode($request);
        if (!$response['status']) {

            return back()->with('error', __('violation.error'));
        }
        return back()->with('info', 'تم ارسال الكود الى بريدك الالكتروني');
    }
}
