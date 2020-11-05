<?php

namespace App\Http\Controllers\Web\Tender;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Tender\CompanyController as CMCtrl;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    private $company;

    public function __construct()
    {
        $this->company = new CMCtrl();
    }

    public function index(Request $request)
    {

        $page_title = 'All Companies';
        if (!$request->get('state')){
            $request->request->add(["state"=> "PAIDFEESFORTHISYEAR"]);
        }
        $companies = $this->company->index($request)['data']['companies'] ?? [];
        $companies = custom_paginate($companies);
//        return $companies;
        return view('pages.tenders.company.all.index', compact('page_title', 'companies'));

    }

    public function create()
    {
        $page_title = 'Create Company';
        return view('pages.tenders.company.add.index', compact('page_title'));

    }

    public function store(Request $request)
    {
        $response = $this->company->store($request);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allCompanies')->with('success', __('violation.add_success'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Company';

        $company = $this->company->find($id)['data']['company'] ?? null;

        if (!$company) {
            return back()->with('error', __('violation.error'));
        }

        return view('pages.tenders.company.edit.index', compact('page_title', 'company'));

    }

    public function update(Request $request, $id)
    {
        $response = $this->company->update($request, $id);

        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        return $this->company->delete($request->id ?? 0);
    }

    public function getCompanyTransactions(Request $request, $id)
    {
        $page_title = 'Company Transactions';
        $subscription = $this->company->getCompanySubscription($id)['data']['subscription'] ?? null;
        if (!$subscription) {
            return back()->with('error', __('violation.error'));
        }
        $subscription = custom_paginate($subscription, 1);
        return view('pages.tenders.company.get-transactions.index', compact('page_title', 'subscription'));
    }

    public function getCompnayFiles(Request $request, $id)
    {

        $page_title = 'Edit Company Files';
        $company = $this->company->find($id)['data']['company'] ?? null;

        if (!$company) {
            return back()->with('error', __('violation.error'));
        }

        $company_files = $company->tender_company->files ?? [];
        // return $company_files;
        $files = [
            'd1' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
            'd2' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
            'd3' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
            'd4' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
            'd5' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
            'd6' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
            'd7' => ['file' => '', 'id' => '', 'is_approved' => '', 'expired_date' => '', 'comment' => '', 'type' => 0,],
        ];
        if (count($company_files) > 0) {

            // return $company_files->first();
            $files ['d1'] = [
                'file' => $company_files->where('name', 'd1')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd1')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd1')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd1')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd1')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd1')->first()->type ?? 0,
            ];
            $files ['d2'] = [
                'file' => $company_files->where('name', 'd2')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd2')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd2')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd2')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd2')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd2')->first()->type ?? 0,
            ];
            $files ['d3'] = [
                'file' => $company_files->where('name', 'd3')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd3')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd3')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd3')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd3')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd3')->first()->type ?? 0,
            ];
            $files ['d4'] = [
                'file' => $company_files->where('name', 'd4')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd4')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd4')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd4')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd4')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd4')->first()->type ?? 0,
            ];
            $files ['d5'] = [
                'file' => $company_files->where('name', 'd5')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd5')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd5')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd5')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd5')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd5')->first()->type ?? 0,
            ];
            $files ['d6'] = [
                'file' => $company_files->where('name', 'd6')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd6')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd6')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd6')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd6')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd6')->first()->type ?? 0,
            ];
            $files ['d7'] = [
                'file' => $company_files->where('name', 'd7')->first()->file_data ?? '',
                'id' => $company_files->where('name', 'd7')->first()->id ?? '',
                'is_approved' => $company_files->where('name', 'd7')->first()->is_approved ?? '',
                'expired_date' => $company_files->where('name', 'd7')->first()->expired_date ?? '',
                'comment' => $company_files->where('name', 'd7')->first()->comment ?? '',
                'type' => $company_files->where('name', 'd7')->first()->type ?? 0,
            ];
        }
//
        // return $files;
        return view('pages.tenders.company.edit-files.index', compact('page_title', 'company', 'files'));

    }


    public function handleCompnayFiles(Request $request, $id)
    {
        $request->request->add(['id' => $id]);

        $response = $this->company->uploadFiles($request);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }
        return back()->with('info', __('violation.edit_success'));
    }


    public function decideCompnayFiles(Request $request)
    {
        return $this->company->decideFile($request);
    }

    public function markAsRead(Request $request)
    {
        return $this->company->markAsViewed($request->id ?? 0);
    }

    public function activateDeactivate(Request $request)
    {
        return $this->company->approveCompany($request->all());
    }

    public function payCompanySubscription(Request $request)
    {
        return $this->company->payForThisYear($request);

    }

}
