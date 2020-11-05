<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\ParagraphPunishmentController;
use App\Http\Controllers\Api\PunishmentRuleController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PunishmentController extends Controller
{
    private $punishment;
    private $p_punishment;
    private $utility;

    public function __construct()
    {
        $this->punishment = new PunishmentRuleController();
        $this->p_punishment = new ParagraphPunishmentController();
        $this->utility = new UtilityController();
    }

    public function index()
    {
        $page_title = 'ALL Punishment Rules';
        $response = $this->punishment->index();
        $punishments = collect([]);
        if ($response['status']) {
            $punishments = $response['data']['punishments'];
        }
//        $punishments = custom_paginate($punishments);

        return view('pages.violation.punishment.all.index', compact('page_title', 'punishments'));
    }

    public function create()
    {
        $page_title = 'Create Rule';
        $status = $this->utility->getStatus('pragraphFine')['data']['status'] ?? [];
        return view('pages.violation.punishment.add.index', compact('page_title', 'status'));

    }

    public function store(Request $request)
    {
//        return $request->all();
        $response = $this->punishment->store($request);

        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            $errors['paragraph_count'] = count($request->paragraph_title ?? [0]);

            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allPunishmentRules')->with('success', __('violation.add_success'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Rule';
        $response = $this->punishment->show($id);
        $status = $this->utility->getStatus('pragraphFine')['data']['status'] ?? [];

        $punishment = null;

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }
        $punishment = $response['data']['punishment'];
//        return $punishment;
        return view('pages.violation.punishment.edit.index', compact('page_title', 'punishment', 'status'));
    }

    public function update(Request $request, $id)
    {
//        return $request->all();
        $response = $this->punishment->update($request, $id);

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
        return $this->punishment->destroy($id);
    }

    public function deleteParagraph(Request $request)
    {
        return $this->p_punishment->destroy($request->id ?? 0);
    }
}
