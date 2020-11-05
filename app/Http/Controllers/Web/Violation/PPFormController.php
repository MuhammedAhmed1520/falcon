<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\ViolationFormController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PPFormController extends Controller
{
    private $form;
    private $violation_form;
    private $violation;

    public function __construct()
    {
        $this->form = new FormController();
        $this->violation_form = new ViolationFormController();
        $this->violation = new \App\Http\Controllers\Api\ViolationController();
    }

    public function editPPFromView()
    {
        $form_id = 1;
        $response = $this->form->show($form_id);

        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $form_data = $response['data']['form'];

        return view('pages.violation.ppForm.edit_pp_form', compact('form_data', 'form_id'));
    }


    public function editPPFromManualView()
    {
        $form_id = 1;
        $response = $this->form->show($form_id);

        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $form_data = $response['data']['form'];

        return view('pages.violation.ppForm.edit_pp_form_manual', compact('form_data', 'form_id'));
    }


    public function handleEditPPFrom(Request $request)
    {
        $id = $request->id ?? 0;
        return $this->form->update($request, $id);
    }

    public function addViolationPPFromView(Request $request, $id)
    {
        $response = $this->violation_form->show($id);
        $violation_data = $this->violation->getFormData($id)['data']['data'] ?? null;
        // return $violation_data;

        if (!$response['status']) {
            // if you add new pp form
            return $this->returnViewNewForm($violation_data);
        }
        // if you already saved pp form before
        return $this->returnViewOldForm($response, $violation_data);

    }

    public function handleAddNewPPFrom(Request $request, $id)
    {
        $request->request->add(['violation_id' => $id]);
        return $this->violation_form->store($request);
    }

    protected function returnViewNewForm($violation_data)
    {
        $form_id = 1;
        $response = $this->form->show($form_id);

        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $form_data = $response['data']['form'];

        return view('pages.violation.ppForm.add_pp_form', compact('form_data', 'form_id', 'violation_data'));
    }

    protected function returnViewOldForm($response, $violation_data)
    {
        $form_id = 1;
        $form_data = $response['data']['form']['html'] ?? null;


        return view('pages.violation.ppForm.view_add_pp_form', compact('form_data', 'form_id', 'violation_data'));
    }

    public function createExternalPPFromView()
    {
        $form_id = 1;
        $response = $this->form->show($form_id);

        if (!$response['status']) {
            return back()->with('error', __('violation.error'));
        }

        $form_data = $response['data']['form'];

        return view('pages.violation.ppForm.external.create', compact('form_data', 'form_id'));
    }

    public function editExternalPPForm(Request $request, $id)
    {
        $form_data = $this->violation_form->findForm($id)['data']['form'] ?? null;
        if (!$form_data) {
            return back()->with('error', __('violation.error'));
        }
        return view('pages.violation.ppForm.external.edit', compact('form_data'));
    }


    public function handleCreateExtrenalPPFrom(Request $request)
    {
        return $this->violation_form->createForm($request);
    }


    public function handleEditExtrenalPPFrom(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        return $this->violation_form->updateForm($request);
    }


    public function handleDeleteExtrenalPPFrom(Request $request)
    {
        return $this->violation_form->deleteForm($request->id);
    }

    public function allExternalPPFromView(Request $request)
    {
        $forms = $this->violation_form->getAllForms()['data']['forms'] ?? [];
        $forms = custom_paginate($forms);

        return view('pages.violation.ppForm.external.all.index', compact('forms'));
    }
}
