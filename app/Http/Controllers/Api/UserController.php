<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\MainTrait\MainTrait;
use App\Modules\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use MainTrait;
    /**
     * Instance Of User Presenter
     */
    protected $userPresenter;

    public function __construct()
    {
        $this->userPresenter = new User();
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return $this->userPresenter->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
        return $this->userPresenter->find($id);

    }
    public function findByUserName($username)
    {
        //
        return $this->userPresenter->findByUsername($username);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
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


    public function updateAuthData(Request $request)
    {
        $validation = $this->UpdateAuthUserRequest($request->all());
        if ($validation->fails()) {
            return return_msg(false, 'validation errors', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->userPresenter->updateAuthData($request->all());

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
