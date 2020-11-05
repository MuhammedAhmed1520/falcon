<?php

namespace App\Http\Controllers\Web\Settings;

use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use  App\Http\Controllers\Api\UserController as USERCtrl;
use  App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    private $user;
    private $utility;
    private $role;


    public function __construct()
    {
        $this->user = new USERCtrl();
        $this->utility = new UtilityController();
        $this->role = new RoleController();
    }

    public function index()
    {
        $page_title = 'ALL Users';
        $response = $this->user->index();
        $users = collect([]);

        if ($response['status']) {
            $users = $response['data']['users'];
        }

        return view('pages.settings.users.all.index', compact('page_title', 'users'));
    }

    public function create()
    {
        $page_title = 'Create User';
        $roles = $this->role->index()['data']['roles'] ?? [];

        return view('pages.settings.users.add.index', compact('page_title', 'roles'));
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
        $roles = $this->role->index()['data']['roles'] ?? [];

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }
        $user = $response['data']['user'];

        return view('pages.settings.users.edit.index', compact('page_title', 'roles', 'user'));

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
        return view('pages.settings.users.updatePassword.index', compact('page_title','user'));
    }
    
    public function handleUpdateUserPassword(Request $request,$id){
        
        $response = $this->user->handleUpdatePassword($request , $id);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }

        return back()->with('success', __('violation.edit_success'));
    }
}
