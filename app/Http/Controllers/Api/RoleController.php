<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\MainTrait\MainTrait;
use App\Modules\Role\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    use MainTrait;
    /**
     * Instance Of Role Presenter
     */
    protected $rolePresenter;

    public function __construct()
    {
        $this->rolePresenter = new Role();
    }

    public function index()
    {
        return $this->rolePresenter->all();
    }


    public function store(Request $request)
    {
        // validate request
        $validation = $this->CreateRoleRequest($request->all());
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->rolePresenter->create($request->all());
    }

    public function show($id)
    {
        //
        return $this->rolePresenter->find($id);

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['id'] = $id;
        // validate request
        $validation = $this->UpdateRoleRequest($data);
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->rolePresenter->update($data);
    }

    public function destroy($id)
    {
        //
        return $this->rolePresenter->delete($id);
    }

    public function getPermission()
    {
        //
        return $this->rolePresenter->getPermission();
    }
}
