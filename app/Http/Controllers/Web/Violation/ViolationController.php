<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\UtilityController;
use App\Http\Controllers\Api\OfficerController;
use App\Http\Controllers\Api\ViolationController as ViolationCtrl;
use App\Modules\Violation\LockedItems\LockItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViolationController extends Controller
{
    private $utility;
    private $officer;
    private $violation;
    private $lock_items;
    private $report;

    public function __construct()
    {
        $this->utility = new UtilityController();
        $this->officer = new OfficerController();
        $this->violation = new ViolationCtrl();
        $this->lock_items = new LockItem();
        $this->report = new ReportController();


    }

    public function index(Request $request)
    {
        $page_title = 'ALL Violations';
        $response = $this->violation->index($request);
        $violations = collect([]);
        if ($response['status']) {
            $violations = $response['data']['violations'];
        }

        $violations = custom_paginate($violations);
        // return $violations;
        $areas = $this->utility->getAreas()['data']['areas'] ?? [];
        $status = $this->utility->getStatus()['data']['status'] ?? [];
        $categories = $this->utility->getCategory()['data']['categories'] ?? [];
        $nationality = $this->utility->getNationality()['data']['nationality'] ?? [];
        $actions = $this->utility->getActions()['data']['actions'] ?? [];
        $lock_items = $this->lock_items->all()['data']['lockItems']->pluck('item') ?? [];
        $officers = $this->officer->index()['data']['officers'] ?? [];
        return view('pages.violation.violation.all.index', compact('page_title', 'violations', 'areas', 'status', 'categories', 'nationality', 'actions', 'officers', 'lock_items'));
    }

    public function create()
    {

        $page_title = 'Create Violation';

        $areas = $this->utility->getAreas()['data']['areas'] ?? [];
        $status = $this->utility->getStatus()['data']['status'] ?? [];
        $categories = $this->utility->getCategory()['data']['categories'] ?? [];
        $nationality = $this->utility->getNationality()['data']['nationality'] ?? [];
        $subject_punishment = $this->utility->getParagraphPivote(\request())['data']['paragraphs'] ?? [];
        $actions = $this->utility->getActions()['data']['actions'] ?? [];
        $lock_items = $this->lock_items->all()['data']['lockItems']->pluck('item') ?? [];
        $officers = $this->officer->index()['data']['officers'] ?? [];
        $types = $this->utility->getNumberTypes()['data']['types'] ?? [];
        // 
        // return $subject_punishment;

        return view('pages.violation.violation.add.index', compact('page_title', 'areas', 'types', 'status', 'categories', 'officers', 'nationality', 'subject_punishment', 'actions', 'lock_items'));
    }

    public function store(Request $request)
    {
        $request = $this->prepareTagsInput($request);
        $response = $this->violation->store($request);
        // return $response;
        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allViolations')->with('success', __('violation.add_success'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Violation';
        $response = $this->violation->show($id);
        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $violation = $response['data']['violation'];
//
        // return $violation;
        $areas = $this->utility->getAreas()['data']['areas'] ?? [];
        $status = $this->utility->getStatus()['data']['status'] ?? [];
        $categories = $this->utility->getCategory()['data']['categories'] ?? [];
        $nationality = $this->utility->getNationality()['data']['nationality'] ?? [];
        $subject_punishment = $this->utility->getParagraphPivote($request)['data']['paragraphs'] ?? [];
        $actions = $this->utility->getActions()['data']['actions'] ?? [];
        $lock_items = $this->lock_items->all()['data']['lockItems']->pluck('item') ?? [];
        $officers = $this->officer->index()['data']['officers'] ?? [];
        $types = $this->utility->getNumberTypes()['data']['types'] ?? [];

        return view('pages.violation.violation.edit.index', compact('page_title', 'violation', 'areas', 'status', 'types', 'categories', 'officers', 'nationality', 'subject_punishment', 'actions', 'lock_items'));
    }


    public function showViolationData(Request $request, $id)
    {
        $page_title = 'Show Violation';
        $response = $this->violation->show($id);
        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $violation = $response['data']['violation'];
        

        return view('pages.violation.violation.show.index', compact('page_title', 'violation'));
    }


    public function update(Request $request, $id)
    {
        $request = $this->prepareTagsInput($request);
        
        $response = $this->violation->update($request, $id);
        // return $response;
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('success', __('violation.edit_success'));
    }
    public function updateAction(Request $request)
    {
        $response = $this->violation->updateViolationAction($request);
//         return $response;
        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }
        return back()->with('success', __('violation.edit_success'));
    }

    protected function prepareTagsInput(Request $request)
    {
        if (!$request->lockItem) {
            $request->request->add(['lockItem' => []]);
            return $request;
        }

        $lock_items = json_decode($request->lockItem);
        $lock_items = collect($lock_items);
        $lock_items = $lock_items->pluck('value')->toArray();

        $request->request->add(['lockItem' => $lock_items]);


        return $request;
    }

    public function delete(Request $request)
    {
        return $this->violation->destroy($request->id ?? 0);
    }

    public function generateViolationReport()
    {
        $page_title = 'generate Violation Report';
        $areas = $this->utility->getAreas()['data']['areas'] ?? [];
        $status = $this->utility->getStatus()['data']['status'] ?? [];
        $categories = $this->utility->getCategory()['data']['categories'] ?? [];
        $nationality = $this->utility->getNationality()['data']['nationality'] ?? [];
        $actions = $this->utility->getActions()['data']['actions'] ?? [];
        $lock_items = $this->lock_items->all()['data']['lockItems']->pluck('item') ?? [];
        $officers = $this->officer->index()['data']['officers'] ?? [];
        $subject_punishment = $this->utility->getParagraphPivote(\request())['data']['paragraphs'] ?? [];


        return view('pages.violation.reports.all.index', compact('page_title', 'areas', 'categories', 'status', 'nationality', 'actions', 'lock_items', 'officers', 'subject_punishment'));
    }

    public function generateViolationReportParams(Request $request)
    {
        $page_title = 'generate Violation Report';
        $reponse = $this->report->reportTable($request);
        $statistics_only = $request->statistics_only == 'true' ? 1 : 0;
        $table_only = $request->table_only == 'true' ? 1 : 0;

        $data = $reponse['data'];
        // return $data;
        return view('pages.violation.reports.view_data.index', compact('page_title', 'data', 'statistics_only', 'table_only'));
    }


    public function getViolationPayment(Request $request, $id)
    {
        $page_title = 'Violation Payment';
        $response = $this->violation->show($id);

        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $violation = $response['data']['violation'];
//        return $violation;
        return view('pages.violation.payment.create.index', compact('page_title', 'violation'));
    }

    public function handleViolationPayment(Request $request)
    {
        $data = $request->all();
        $data['email'] = $data['email'] ?? 'payment@epa.com';
        $data['phone'] = $data['phone'] ?? '12345678';
        $request = new Request($data);
        $response = $this->violation->pay($request);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('success', __('violation.success'));
    }

    public function generateViolationReceipt(Request $request)
    {
        $page_title = 'Violation Receipt';
        $id = $request->violation_id;
        $response = $this->violation->show($id);

        if (!$response['status']) {
            return 'NOT FOUND';
        }

        $violation = $response['data']['violation'];
        return view('pages.violation.payment.receipt', compact('violation','page_title'));
    }
}
