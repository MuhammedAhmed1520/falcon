<?php

namespace App\Http\Controllers\Web\Tender;

use App\Http\Controllers\Api\Tender\TenderPageController;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    private $tenderPage;

    public function __construct()
    {
        $this->tenderPage = new TenderPageController();
    }

    public function index(Request $request)
    {
        $page_title = 'All Pages';
        $tender_pages = $this->tenderPage->index($request)['data']['tender_pages'];
        $tender_pages = custom_paginate($tender_pages);
        return view('pages.tenders.pages.all.index', compact('page_title', 'tender_pages'));
    }

    public function create()
    {
        $page_title = 'Create Page';
        return view('pages.tenders.pages.add.index', compact('page_title'));
    }

    public function store(Request $request)
    {
        $response = $this->tenderPage->store($request);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }

        return redirect()->route('allPages')->with('success', __('violation.add_success'));
    }

    public function edit(Request $request, $id)
    {

        $page_title = 'Edit Page';
        $page = $this->tenderPage->show($id)['data']['page'] ?? null;
        if (!$page) {
            return back()->with('error', 'Not Found');
        }
        return view('pages.tenders.pages.edit.index', compact('page_title', 'page'));
    }

    public function update(Request $request, $id)
    {
        $page = $this->tenderPage->show($id)['data']['page'] ?? null;
        if (!$page) {
            return back()->with('error', 'Not Found');
        }

        $response = $this->tenderPage->update($request, $id);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }

        return redirect()->route('allPages')->with('info', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        return $this->tenderPage->destroy($request->id ?? 0);
    }
}
