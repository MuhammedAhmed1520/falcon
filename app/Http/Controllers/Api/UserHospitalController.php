<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\MainTrait\MainTrait;
use App\Modules\User\UserHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserHospitalController extends Controller
{
    use MainTrait;
    /**
     * Instance Of User Presenter
     */
    protected $userPresenter;

    public function __construct()
    {
        $this->userPresenter = new UserHospital();
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return $this->userPresenter->all();
    }


    public function store(Request $request)
    {
        // validate request
        $validation = $this->CreateUserRequest($request->all());
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->userPresenter->create($request->all());
    }

    public function show($id)
    {
        return $this->userPresenter->find($id);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['id'] = $id;
//        dd($data);
        // validate request
        $validation = $this->UpdateUserRequest($data);
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->userPresenter->update($data);
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
        return $this->userPresenter->updatePassword($request_data);
    }


    public function destroy($id)
    {
        //
        return $this->userPresenter->delete($id);
    }

    public function forgetPassword(Request $request)
    {
        $validation = $this->forgetPasswordRequest($request->all());
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->userPresenter->forgetPassword($request->all());

    }
    public function resetPassword(Request $request)
    {
        $validation = $this->resetPasswordRequest($request->all());
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->userPresenter->resetPassword($request->all());

    }
}
