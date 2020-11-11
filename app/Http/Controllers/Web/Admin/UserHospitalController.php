<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Controller;

class UserHospitalController extends Controller
{

    private $user;
    private $utiliyCTRL;


    public function __construct()
    {
        $this->user = new \App\Http\Controllers\Api\UserHospitalController();
        $this->utiliyCTRL = new UtilityController();
    }

    public function index()
    {
        $page_title = 'ALL Users Hospital';
        $response = $this->user->index();
        $users = collect([]);

        if ($response['status']) {
            $users = $response['data']['users'];
        }

        return view('pages.settings.hospitals.all.index', compact('page_title', 'users'));
    }

    public function create()
    {
        $page_title = 'Create User';
        $options = $this->utiliyCTRL->allOptions('P_FAL_INJ_HOSPITAL')['data']['options'] ?? [];
        return view('pages.settings.hospitals.add.index', compact('page_title', 'options'));
    }


    public function store(Request $request)
    {
        $response = $this->user->store($request);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }


        return redirect()->route('allUsers')->with('success', __('violation.add_success'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Roles';
        $response = $this->user->show($id);
        $user = null;
        $options = $this->utiliyCTRL->allOptions('P_FAL_INJ_HOSPITAL')['data']['options'] ?? [];

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }
        $user = $response['data']['user'];

        return view('pages.settings.hospitals.edit.index', compact('page_title', 'options', 'user'));

    }

    public function update(Request $request, $id)
    {
        $response = $this->user->update($request, $id);

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        $id = $request->id ?? 0;

        return $this->user->destroy($id);
    }


    public function changePassword()
    {
        $page_title = 'Chance Password User';
        $user = auth()->user();
        // return $user;
        return view('pages.settings.hospitals.updatePassword.index', compact('page_title', 'user'));
    }

    public function handleUpdateUserPassword(Request $request, $id)
    {

        $response = $this->user->handleUpdatePassword($request, $id);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }

        return back()->with('success', __('violation.edit_success'));
    }
}
