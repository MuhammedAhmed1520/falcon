<?php

namespace App\Http\Controllers\Web\Tender;

use App\Http\Controllers\Api\Tender\ApplicationController;
use App\Http\Controllers\Api\Tender\BuyerController;
use App\Http\Controllers\Api\Tender\ReportController;
use App\Http\Controllers\Api\Tender\TenderFileDetailController;
use App\Http\Controllers\Api\Tender\WinnerController;
use App\Http\Controllers\Api\Tender\CompanyController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TenderController
 * @package App\Http\Controllers\Web\Tender
 */
class TenderController extends Controller
{
    /**
     * @var \App\Http\Controllers\Api\Tender\TenderController
     */
    private $tender;
    /**
     * @var \App\Http\Controllers\Api\Tender\TenderFileDetailController
     */
    private $tenderfile;
    /**
     * @var \App\Http\Controllers\Api\Tender\CompanyController
     */
    private $company;
    /**
     * @var \App\Http\Controllers\Api\Tender\BuyerController
     */
    private $buyer;
    private $application;
    private $winner;
    private $report;
    /**
     * @var UtilityController
     */
    private $utility;

    /**
     * TenderController constructor.
     */
    public function __construct()
    {
        $this->tender = new \App\Http\Controllers\Api\Tender\TenderController();
        $this->tenderfile = new TenderFileDetailController();
        $this->company = new CompanyController();
        $this->buyer = new BuyerController();
        $this->application = new ApplicationController();
        $this->winner = new WinnerController();
        $this->utility = new UtilityController();
        $this->report = new ReportController();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $page_title = 'All Tenders';
        $tenders = $this->tender->index($request)['data']['tenders'] ?? [];
        $tenders = custom_paginate($tenders);
        return view('pages.tenders.tender.all.index', compact('page_title', 'tenders'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $page_title = 'Create Tender';
        $order_id = $this->utility->getLastTenderOrder() ?? 1;
        return view('pages.tenders.tender.add.index', compact('page_title', 'order_id'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $response = $this->tender->store($request);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];;
            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allTenders')->with('success', __('violation.add_success'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Tender';
        $tender = $this->tender->show($id)['data']['tender'] ?? null;

        if (!$tender) {
            return back();
        }
        return view('pages.tenders.tender.edit.index', compact('page_title', 'tender'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $response = $this->tender->update($request, $id);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];;
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('info', __('violation.edit_success'));
    }

    /**
     * @param Request $request
     * @return array|null
     */
    public function delete(Request $request)
    {
        return $this->tender->destroy($request->id ?? 0);

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getTenderFilesView(Request $request, $id)
    {
        $page_title = 'Tender Files';
        $tender = $this->tender->show($id)['data']['tender'] ?? null;
        $placements = $this->utility->getTenderPlacements()['data']['placement'] ?? [];

        if (!$tender) {
            return back();
        }
//        return $tender;
        return view('pages.tenders.tender.allTenderFiles.index', compact('page_title', 'tender', 'placements'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createFileDetails(Request $request, $id)
    {

        $response = $this->tenderfile->store($request, $id);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];;
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('success', __('violation.add_success'));;
    }

    /**
     * @param Request $request
     * @param $tender_id
     * @return array|null
     */
    public function deleteFileDetails(Request $request, $tender_id)
    {
        return $this->tenderfile->destroy($request->id ?? 0);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getTenderPostponeView(Request $request, $id)
    {
        $page_title = 'Postpone Tender';
        $tender = $this->tender->show($id)['data']['tender'] ?? null;

        if (!$tender) {
            return back();
        }
        return view('pages.tenders.tender.postpone.index', compact('page_title', 'tender'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handlePostponeView(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $response = $this->tender->extendClosingDate($request);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];;
            return back()->withErrors($errors)->withInput();
        }
        return back()->with('info', __('violation.edit_success'));;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getTenderBuyersView(Request $request, $id)
    {
        $page_title = 'Tender Buyers';

        $tender = $this->tender->show($id)['data']['tender'] ?? null;

        if (!$tender) {
            return back();
        }

        $companies = $this->company->index()['data']['companies'] ?? [];
        $payment_types = $this->utility->getPaymentType()['data']['payment'];

        $buyers = $this->tender->getBuyers($id)['data']['buyers'] ?? [];

        return view('pages.tenders.tender.allTenderBuyers.index', compact('page_title', 'companies', 'payment_types', 'buyers'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleTenderBuyersStore(Request $request, $id)
    {
        $request->request->add(['tender_id' => $id]);
        $response = $this->buyer->store($request);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('success', __('violation.add_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleTenderBuyersUpdate(Request $request)
    {
        $this->buyer->update($request);
        return back()->with('info', __('violation.edit_success'));
    }

    /**
     * @param Request $request
     * @return array|null
     */
    public function handleTenderBuyersDelete(Request $request)
    {

        return $this->buyer->delete($request->id ?? 0);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getTenderApplicationsView(Request $request, $id)
    {
        $page_title = 'Tender Applications';
        $tender = $this->tender->show($id)['data']['tender'] ?? null;
        if (!$tender) {
            return back();
        }

        $buyers = $this->tender->getBuyers($id)['data']['buyers'] ?? [];
        $applications = $this->tender->getApplication($id)['data']['applications'] ?? [];

        return view('pages.tenders.tender.allTenderApplications.index', compact('page_title', 'buyers', 'applications'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function handleTenderApplicationsStore(Request $request, $id)
    {
        $request->request->add(['tender_id' => $id]);
        $response = $this->application->store($request);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('success', __('violation.add_success'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function handleTenderApplicationsUpdate(Request $request, $id)
    {
        $response = $this->application->update($request);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function handleTenderApplicationsDelete(Request $request)
    {
        return $this->application->delete($request->id ?? 0);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSelectWinnersView(Request $request, $id)
    {
        $page_title = 'Tender Applications';
        $applications = $this->tender->getApplication($id)['data']['applications'] ?? [];
        $winner = $this->tender->getWinner($id)['data']['winner'];
        return view('pages.tenders.tender.winners.index', compact('page_title', 'applications', 'winner'));

    }

    public function handleUpdateWinnerApplication(Request $request, $id)
    {
        $request->request->add(['tender_id' => $id]);
        $response = $this->winner->store($request);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function generateTenderReport()
    {
        $page_title = 'Tender Generate Report';
        return view('pages.tenders.tender.reports.all.index', compact('page_title'));
    }

    public function generateTenderSubscriptionPaymentReport(Request $request)
    {
        $page_title = 'Tender Subscription Payment Report';
        $subscriptions = $this->report->subscriptionReport($request)['data']['subscription'];
//        return $subscriptions;
        return view('pages.tenders.tender.reports.company_subscription_payments.index', compact('page_title','subscriptions'));
    }

    public function generateTenderBuyersPaymentReport(Request $request)
    {
        $page_title = 'Tender Buyers Payment Report';
        $buyers = $this->report->buyerReport($request)['data']['buyers'] ?? [];
//        return $buyers;
        return view('pages.tenders.tender.reports.buyer_payments.index', compact('page_title','buyers'));
    }
}
