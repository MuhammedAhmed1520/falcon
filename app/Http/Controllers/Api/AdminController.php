<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\MainTrait\MainTrait;
use App\Modules\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use MainTrait;
    /**
     * Instance Of User Presenter
     */
    protected $adminPresenter;

    public function __construct()
    {
        $this->adminPresenter = new Admin();
    }

    public function index()
    {
        $users = $this->adminPresenter->all();
        return $users;
    }

    public function allWithoutPaginate()
    {
        $users = $this->adminPresenter->allWithoutPaginate();
        return $users;
    }

    public function store(Request $request)
    {
        // validate request
        $validation = $this->CreateAdminRequest($request->all());
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        $response = $this->adminPresenter->create($request->all());
        return $response;
    }

    public function show($id)
    {
        //
        return $this->adminPresenter->find($id);

    }
    public function findByUserName($username)
    {
        //
        return $this->adminPresenter->findByUsername($username);

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['id'] = $id;
//        dd($data);
        // validate request
        $validation = $this->UpdateAdminRequest($data);
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        $response = $this->adminPresenter->update($data);
        return $response;
    }
    public function handleUpdatePassword(Request $request,$id)
    {
        $request_data = $request->all();
        $validation = $this->UpdatePasswordRequest($request_data);
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        $request_data['id'] = $id;
        return $this->adminPresenter->updatePassword($request_data);
    }

    public function destroy($id)
    {
        //
        return $this->adminPresenter->delete($id);
    }
}
