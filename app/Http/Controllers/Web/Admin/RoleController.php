<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RoleController as RoleCTRL;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    private $role;

    public function __construct()
    {
        $this->role = new RoleCTRL();
    }


    public function index()
    {
        $page_title = 'ALL Roles';
        $response = $this->role->index();
        $roles = collect([]);


        if ($response['status']) {
            $roles = $response['data']['roles'];
        }
        return view('pages.settings.roles.all.index', compact('page_title', 'roles'));
    }

    public function create()
    {
        $page_title = 'Create Roles';
        $permissions = $this->role->getPermission()['data']['permissions'] ?? [];

        return view('pages.settings.roles.add.index', compact('page_title', 'permissions'));
    }


    public function store(Request $request)
    {
        $response = $this->role->store($request);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }


        return redirect()->route('allRoles')->with('success', __('violation.add_success'));
    }

    public function getRoleUsers(Request $request, $id)
    {
        $page_title = ' Role Users';
        $response = $this->role->show($id);
        if (!$response['status'] ?? null) {
            return back()->withInput()->withErrors($response['data']['validation_errors'] ?? null);
        }
        $role = $response['data']['role'] ?? null;

        return view('pages.settings.roles.roleUsers.index', compact('page_title', 'role'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Roles';
        $response = $this->role->show($id);
        $role = null;
        $permissions = $this->role->getPermission()['data']['permissions'] ?? [];

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        $role = $response['data']['role'];
        $role = $role->makeHidden('permissions');
        $role->permission_ids = $role->permissions->pluck('id') ?? [];

        return view('pages.settings.roles.edit.index', compact('page_title', 'role', 'permissions'));

    }

    public function update(Request $request, $id)
    {
        $response = $this->role->update($request, $id);

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        $id = $request->id ?? 0;

        return $this->role->destroy($id);
    }
}
