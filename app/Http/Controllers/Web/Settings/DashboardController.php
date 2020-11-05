<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Api\ReportController as ViolationReport;
use App\Http\Controllers\Api\Tender\ReportController as TenderReport;
use App\Http\Controllers\Api\LoggerController;
use App\Http\Controllers\Api\OfficeAgent\OfficeAgentController;
use App\Models\Civilian;
use App\Models\Company;
use App\Models\KnetPayment;
use App\Models\OfficeAgentPayment;
use App\Models\Officer;
use App\Models\PunishmentParagraphRule;
use App\Models\PunishmentRule;
use App\Models\SubjectParagraphRule;
use App\Models\SubjectRule;
use App\Models\Tender;
use App\Models\TenderBuyer;
use App\Models\TenderCompany;
use App\Models\TenderCompanySubscription;
use App\Models\User;
use App\Models\Violation;
use App\Models\ViolationCertificate;
use App\Models\ViolationCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Logger;

class DashboardController extends Controller
{

    private $violationReport;
    private $tenderReport;
    private $loggerModel;
    private $office_agent;

    public function __construct()
    {
        $this->violationReport = new ViolationReport();
        $this->tenderReport = new TenderReport();
        $this->loggerModel = new Logger();
        $this->office_agent = new OfficeAgentController();

    }

    public function getDashboard(Request $request)
    {
        $page_title = 'Dashboard';
        $total_statistics = $this->violationReport->statistics()['data']['statistics'] ?? [];

        $tender_statistics = $this->tenderReport->getStatistics($request);
        $office_agent_statistics = $this->office_agent->getStatistics($request)['data'];
        // return $office_agent_statistics;
        $route_name = auth()->user()->role->route_name ?? null;
        $is_redirect_to = $this->redirectSwitch($route_name);
        if ($is_redirect_to) {
            return redirect($is_redirect_to);
        }
        return view('pages.dashboard.all.index', compact('page_title', 'total_statistics', 'tender_statistics','office_agent_statistics'));
    }

    protected function redirectSwitch($route_name)
    {
        if (!$route_name) {
            return false;
        }
        switch ($route_name) {
            case 'getDashboardView':
                return false;
                break;
            default :
                return route($route_name);
                break;
        }
    }


    public function getPayments(Request $request)
    {
        $page_title = 'Payments';
        $payments = Payment::orderBy('id', 'desc')->get();
        $payments = $this->filter($payments, $request->all());
        $payments = $payments->sortByDesc(function ($item){
            return $item['payed_at'];
        });
        $paymentable_types = Payment::distinct('paymentable_type')->get(['paymentable_type'])->pluck('paymentable_type');
        $paginated = (bool) $request->no_paginated;
        // dd($paginated);
        if(!$request->no_paginated){

            $payments = custom_paginate($payments, 100);

        }
        return view('pages.settings.payments.all.index', compact('page_title', 'payments', 'paymentable_types'));
    }

    public function filter($payments, array $data)
    {
        if ($data['start_date'] ?? null) {
            $start_date = Carbon::parse($data['start_date']);
            $payments = $payments->filter(function ($element) use ($start_date) {
                $element_date = Carbon::parse($element['created_at']);
                return $element_date->gte($start_date);
            });
        }
        if ($data['end_date'] ?? null) {
            $end_date = Carbon::parse($data['end_date']);
            $payments = $payments->filter(function ($element) use ($end_date) {
                $element_date = Carbon::parse($element['created_at']);
                return $element_date->lte($end_date);
            });
        }
        if ($data['amount'] ?? null) {
            $payments = $payments->filter(function ($element) use ($data) {
                return $data['amount'] == $element['cost'];
            });
        }
        if ($data['status'] ?? null) {
            if ($data['status'] != "ALL") {
                $payments = $payments->filter(function ($element) use ($data) {
                    return $data['status'] == ($element['knet_data']['result'] ?? null);
                });
            }
        }
        if ($data['type'] ?? null) {
            if ($data['type'] != "ALL") {
                $payments = $payments->filter(function ($element) use ($data) {
                    $e = str_replace('App\Models\\', '', $element['paymentable_type']);
                    return $e == $data['type'];
                });
            }
        }
        if ($data['payment_type'] ?? null) {
            if ($data['payment_type'] != "ALL") {
                $payments = $payments->filter(function ($element) use ($data) {
                    if ($data['payment_type'] == "CASH") {
                        if ($element['status'] == "1" && $element['knet_data'] == null) {
                            return $element;
                        }

                    } else {
                        return $element['knet_data'] != null;
                    }
                });
            }
        }
        return $payments;
    }

    public function getLogger(Request $request)
    {
        $page_title = 'Logger';
        $logger = new LoggerController();
        $data = $request->all();
        $logger = $this->loggerModel->orderBy('id', 'desc')->with(['user:id,name,username', 'data'])->where('user_id', '<>', null);

        if ($data['user_id'] ?? null) {
            $logger = $logger->where('user_id', $data['user_id']);
        }
        if ($data['start_date'] ?? null) {
            $logger = $logger->whereDate('created_at', '>=', $data['start_date']);
        }
        if ($data['end_date'] ?? null) {
            $logger = $logger->whereDate('created_at', '<=', $data['end_date']);
        }
        $logger = $logger->get();
        $loggers = custom_paginate($logger, 10);
        $users = User::all();
        return view('pages.settings.logger.all.index', compact('page_title', 'loggers', 'users'));

    }

    public function loggerFilter($logger, $data)
    {
        if ($data['user_id'] ?? null) {
            $logger = $logger->filter(function ($element) use ($data) {
                return $data['user_id'] == $element['user_id'];
            });
        }
        return $logger;

    }

    public function getSiteSearch(Request $request)
    {
        $query = $request->get('search_key');

        $civilian = Civilian::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('ssn', 'LIKE', '%' . $query . '%')
            ->orWhere('mobile', 'LIKE', '%' . $query . '%')
            ->get(['name', 'mobile', 'ssn']);

        $company = Company::where('name', 'LIKE', '%' . $query . '%')
            ->get(['name']);

        $officer = Officer::where('phone', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get(['phone', 'email', 'name']);

        $knet = KnetPayment::where('tran_id', 'LIKE', '%' . $query . '%')
            ->orWhere('payment_id', 'LIKE', '%' . $query . '%')
            ->get(['tran_id', 'payment_id']);

        $payment = Payment::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('check_info', 'LIKE', '%' . $query . '%')
            ->get(['name', 'phone', 'email']);

        $punishment_paragraph = PunishmentParagraphRule::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('details', 'LIKE', '%' . $query . '%')
            ->get(['title', 'details']);
        $punishment = PunishmentRule::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('number', 'LIKE', '%' . $query . '%')
            ->get(['title', 'number']);

        $subject = SubjectRule::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('number', 'LIKE', '%' . $query . '%')
            ->get(['title', 'number']);

        $subject_paragraph = SubjectParagraphRule::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('details', 'LIKE', '%' . $query . '%')
            ->get(['title', 'details']);

        $tender = Tender::where('number', 'LIKE', '%' . $query . '%')
            ->orWhere('title_ar', 'LIKE', '%' . $query . '%')
            ->orWhere('title_en', 'LIKE', '%' . $query . '%')
//            ->orWhere('open_date','LIKE','%'.$query.'%')
            ->get(['title_ar', 'title_en', 'open_date']);

        $tender_company = TenderCompany::where('civil_name', 'LIKE', '%' . $query . '%')
            ->orWhere('reference_code', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%')
            ->orWhere('licence_number', 'LIKE', '%' . $query . '%')
            ->orWhere('civil_ssn', 'LIKE', '%' . $query . '%')
            ->orWhere('name_en', 'LIKE', '%' . $query . '%')
            ->get(['civil_name', 'reference_code', 'email', 'phone', 'licence_number', 'civil_ssn', 'name_en']);

        $violation = Violation::where('serial', 'LIKE', '%' . $query . '%')
            ->orWhere('location_name', 'LIKE', '%' . $query . '%')
            ->orWhere('fine_cost', 'LIKE', '%' . $query . '%')
            ->get(['serial', 'location_name', 'fine_cost']);

        $certificate = ViolationCertificate::where('company_name', 'LIKE', '%' . $query . '%')
            ->orWhere('owner_name', 'LIKE', '%' . $query . '%')
            ->orWhere('civil_ssn', 'LIKE', '%' . $query . '%')
            ->orWhere('license_number', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('mobile', 'LIKE', '%' . $query . '%')
            ->orWhere('phone', 'LIKE', '%' . $query . '%')
            ->orWhere('certificate_no', 'LIKE', '%' . $query . '%')
            ->get(['owner_name', 'civil_ssn', 'license_number', 'email', 'mobile', 'phone', 'certificate_no']);

        $violation_company = ViolationCompany::where('location_address', 'LIKE', '%' . $query . '%')
            ->orWhere('location_activity', 'LIKE', '%' . $query . '%')
            ->orWhere('location_licence', 'LIKE', '%' . $query . '%')
            ->get(['location_address', 'location_activity', 'location_licence']);

        return return_msg(true, "Returned Successfully", compact(
            'civilian', 'company', 'officer', 'violation', 'violation_company', 'certificate', 'tender',
            'tender_company', 'subject', 'subject_paragraph', 'punishment', 'punishment_paragraph', 'payment', 'knet'
        ));
    }

}
