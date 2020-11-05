<?php

namespace App\Http\Controllers\Web\Violation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\OfficerController as OfficerCtrl;

/**
 * Class OfficerController
 * @package App\Http\Controllers\Web\Violation
 */
class OfficerController extends Controller
{

    /**
     * @var OfficerCtrl
     */
    private $officer;

    /**
     * OfficerController constructor.
     */
    public function __construct()
    {
        $this->officer = new OfficerCtrl();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $page_title = 'ALL Officers';
        $response = $this->officer->index();
        $officers = collect([]);

        if ($response['status']) {
            $officers = $response['data']['officers'];
        }
        $officers = custom_paginate($officers);
        return view('pages.violation.officer.all.index', compact('page_title', 'officers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $page_title = 'Create Officers';
        return view('pages.violation.officer.add.index',compact('page_title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $response = $this->officer->store($request);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }

        return redirect()->route('allOfficers')->with('success', __('violation.add_success'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Officers';
        $response = $this->officer->show($id);
        $officer = null;

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        $officer = $response['data']['officer'];
        return view('pages.violation.officer.edit.index', compact('page_title', 'officer'));

    }

    public function update(Request $request, $id)
    {
        $response = $this->officer->update($request, $id);

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        return back()->with('info', __('violation.edit_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id ?? 0;

        return $this->officer->destroy($id);
    }
}
