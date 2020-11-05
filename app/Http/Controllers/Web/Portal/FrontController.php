<?php

namespace App\Http\Controllers\Web\Portal;

use App\Http\Controllers\Api\Tender\CompanyController;
use App\Http\Controllers\Api\Tender\TenderController;
use App\Http\Controllers\Api\Tender\TenderPageController;
use App\Http\Controllers\Web\Tender\PagesController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    private $tender_company;
    private $tender;
    private $page;

    public function __construct()
    {
        $this->tender_company = new CompanyController();
        $this->tender = new TenderController();
        $this->page = new TenderPageController();
    }

    public function getOfficeAgentView()
    {
        return view('portal.pages.tabs.office_agent');
    }


    public function index()
    {
        return view('portal.pages.index.index');
    }

    public function tenderCompanyIndex()
    {
        $is_active = 1;
        return view('portal.pages.tender.index', compact('is_active'));
    }

    public function tenderRegisterCompany()
    {
        $is_active = 1;
        return view('portal.pages.tender.create_company.index', compact('is_active'));
    }

    public function tenderCompanyEnquiry(Request $request, $type)
    {
        $buttonTitle = 'استعلام';
        if($type == "subscriptionPay"){
            $buttonTitle = 'ادفع' ;
        }

        return view('portal.pages.tender.company_reference.index',compact('buttonTitle'));
    }

    public function tenderResetCode(Request $request)
    {

        $is_active = 2;
        return view('portal.pages.tender.forget_code.index', compact('is_active'));
    }

    public function tenderCompanyStatus(Request $request, $code)
    {
        $response = $this->tender_company->findByReferenceCode($code);
        $messages = $this->tender_company->getCompanyStatus($code);
        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }
        $company = $response['data']['company'];
        
        return view('portal.pages.tender.company_status.index', compact('company','messages','code'));
    }

    public function tenderCompanyUpdateFiles(Request $request, $code)
    {

        $response = $this->tender_company->findByReferenceCode($code);
        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }
        $company = $response['data']['company'] ?? null;
        $company_files = $response['data']['company']['files'] ?? [];

        $files = [
            'd1' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
            'd2' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
            'd3' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
            'd4' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
            'd5' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
            'd6' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
            'd7' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => ''],
        ];
        if (count($company_files) > 0) {

            $files ['d1'] = [
                'file' => $company_files->where('name', 'd1')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd1')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd1')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd1')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd1')->first()->comment ?? '',
            ];
            $files ['d2'] = [
                'file' => $company_files->where('name', 'd2')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd2')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd2')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd2')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd2')->first()->comment ?? '',
            ];
            $files ['d3'] = [
                'file' => $company_files->where('name', 'd3')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd3')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd3')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd3')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd3')->first()->comment ?? '',
            ];
            $files ['d4'] = [
                'file' => $company_files->where('name', 'd4')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd4')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd4')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd4')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd4')->first()->comment ?? '',
            ];
            $files ['d5'] = [
                'file' => $company_files->where('name', 'd5')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd5')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd5')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd5')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd5')->first()->comment ?? '',
            ];
            $files ['d6'] = [
                'file' => $company_files->where('name', 'd6')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd6')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd6')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd6')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd6')->first()->comment ?? '',
            ];
            $files ['d7'] = [
                'file' => $company_files->where('name', 'd7')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd7')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd7')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd7')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd7')->first()->comment ?? '',
            ];
        }

        return view('portal.pages.tender.company_update_files.index', compact('files', 'company'));
    }


    public function availableTenders(Request $request)
    {

        $is_active = 4;
        $tenders = $this->tender->getAvailableTender()['data']['tenders'] ?? [];
        return view('portal.pages.tender.available_tenders.index', compact('is_active', 'tenders'));
    }

    public function rejectTenders(Request $request)
    {

        $is_active = 5;
        $tenders = $this->tender->getOfferTender()['data']['tenders'] ?? [];
        return view('portal.pages.tender.reject_tenders.index', compact('is_active', 'tenders'));
    }

    public function approveTenders(Request $request)
    {

        $is_active = 6;
        $tenders = $this->tender->getFinishTender()['data']['tenders'] ?? [];
        return view('portal.pages.tender.approved_tenders.index', compact('is_active', 'tenders'));
    }

    public function allTenders(Request $request)
    {

        $is_active = 3;
        $tenders = $this->tender->getFrontTender()['data']['tenders'] ?? [];
//        return $tenders;
        return view('portal.pages.tender.all_tenders.index', compact('is_active', 'tenders'));
    }

    public function showTenderDetails(Request $request, $id)
    {
        $is_active = 3;
        $tender = $this->tender->show($id)['data']['tender'] ?? null;
        return view('portal.pages.tender.show_tender.index', compact('is_active', 'tender'));

    }
    
    public function showTenderDetailsPostpone(Request $request, $id)
    {
        $is_active = 3;
        $tender = $this->tender->show($id)['data']['tender'] ?? null;
        return view('portal.pages.tender.show_tender_postpone.index', compact('is_active', 'tender'));

    }


    public function showTenderPage(Request $request, $id)
    {

        $page = $this->page->show($id)['data']['page'] ?? null;
        return view('portal.pages.tender.tender_page.index', compact('page'));
    }
}
