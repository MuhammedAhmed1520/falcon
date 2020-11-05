<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\ParagraphRuleController;
use App\Http\Controllers\Api\SubjectRuleController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    private $subject;
    private $utility;
    private $p_subject;

    public function __construct()
    {
        $this->subject = new SubjectRuleController();
        $this->utility = new UtilityController();
        $this->p_subject = new ParagraphRuleController();
    }

    public function index()
    {
        $page_title = 'ALL Subject Rules';
        $response = $this->subject->index();
        $subjects = collect([]);
        if ($response['status']) {
            $subjects = $response['data']['subjects'];
        }
//        $subjects = custom_paginate($subjects);

//        return $subjects;

        return view('pages.violation.subject.all.index', compact('page_title', 'subjects'));
    }

    public function create()
    {
        $page_title = 'Create Rule';
        $next_order = $this->utility->getLastSubjectOrder() ?? 1;
        return view('pages.violation.subject.add.index', compact('page_title', 'next_order'));

    }

    public function store(Request $request)
    {
        $response = $this->subject->store($request);

        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            $errors['paragraph_count'] = count($request->paragraph_title ?? [0]);

            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allSubjectRules')->with('success', __('violation.add_success'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Update Rule';
        $response = $this->subject->show($id);

        $subject = null;

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }
        $subject = $response['data']['subject'];
//        return $subject;
        return view('pages.violation.subject.edit.index', compact('page_title', 'subject'));
    }

    public function update(Request $request, $id)
    {
        $response = $this->subject->update($request, $id);
        if (!$response['status']) {

            $errors = $response['data']['validation_errors'];
            $errors['paragraph_count'] = count($request->paragraph_title ?? [0]);
//            return $errors;
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        $id = $request->id ?? 0;
        return $this->subject->destroy($id);
    }

    public function deleteParagraph(Request $request)
    {
        return $this->p_subject->destroy($request->id ?? 0);
    }
}
