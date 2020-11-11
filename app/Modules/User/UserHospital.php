<?php

namespace App\Modules\User;

use App\Models\PasswordReset;
use App\Support\Repository;
use App\Models\UserHospital as UserHospitalModel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class UserHospital
{
    /**
     * Instance Of Common Repository
     */
    protected $repository;

    /**
     * Instance Of UserModel
     */
    protected $userModel;

    public function __construct()
    {
        $this->repository = new Repository();
        $this->userModel = new UserHospitalModel;
    }

    //Create New User
    public function create(array $data)
    {
        dd($data);
        $data['password'] = bcrypt($data['password']);
        $user = $this->repository->create($this->userModel,$data);
        return return_msg(true, 'User Successfully Added', compact('user'));
    }

    //get All Users
    public function all()
    {
        $data = request()->all();
        $users = $this->userModel->with(['hospital']);
        if ($data['query'] ?? null){
            $users = $users->where('name' ,'like',"%".$data['query']."%")
                ->orWhere('email','like',"%".$data['query']."%");
        }
        $users = $users->get();
        $users = custom_paginate($users,100);
        return return_msg(true, 'User Successfully Returned', compact('users'));
    }

    // Find User
    public function find($id)
    {
        $user = $this->repository->find($this->userModel, $id);
        if (!$user) {
            return return_msg(false, 'User Not Found');
        }
        $user->load(['hospital']);
        return return_msg(true, 'User  Successfully Returned', compact('user'));
    }


    // Delete UserByID
    public function delete($id)
    {
        $user = $this->repository->find($this->userModel, $id);
        if (!$user) {
            return return_msg(false, 'User Not Found');
        }
        //Delete User
        $user = $this->repository->delete($user);
        if ($user) {
            return return_msg(true, 'User Successfully Deleted');
        }
        return return_msg(false, 'Deleted Failed');
    }

    // Update User
    public function update($data)
    {

        $id = $data['id'] ?? null;
        if (!$id) {
            return return_msg(false, 'Id Not Set');
        }
        //Find User  by id
        $user = $this->repository->find($this->userModel, $id);
        if (!$user) {
            return return_msg(false, 'User Not Found');
        }
        if (!isset($data['password'])){
            $data['password'] = $user->password;
        }else{
            $data['password'] = bcrypt($data['password']);
        }

        $user->mobile = $data['mobile'] ?? null;
        $user->save();
        //Update this User
        // $this->repository->update($user, $data);
        return return_msg(true, 'User Successfully Updated');
    }

    public function updatePassword(array $data)
    {
        $user = $this->userModel->find($data['id'] ?? 0);
        if (!$user) {
            return return_msg(false, 'User Not Found');
        }

        if(!Hash::check($data['old_password'],$user->password)){
            return return_msg(false, 'Old Password Wrong',[
                'validation_errors' => ["old_password"=>["كلمة المرور القديمة غير صحيحة"]]
            ]);
        }
        $user->password = bcrypt($data['password']);
        $user->save();
        return return_msg(true,"Updated Successfully");
    }

    public function forgetPassword(array $data)
    {
        $user = $this->userModel->where('email',$data['email'] ?? null)->first();
        if (!$user) {
            return return_msg(false, 'user is not found', [
                'validation_errors' => [
                    "email" => ["هذا المستخدم غير موجود"]
                ]
            ]);
        }
        $token = uniqid().time();

        PasswordReset::insert([
            'email' => $data['email'],
            'token' => $token,
        ]);

        send_email([
            'to' => $data['email'],
            'content' => $token,
            'template' => 'mails.reset_password',
        ]);
        return return_msg(true,"Success");



    }

    public function resetPassword(array $data)
    {


        $token = PasswordReset::where('token',$data['token'])->first();
        if (!$token){
            return return_msg(false, 'user is not found', [
                'validation_errors' => [
                    "password" => ["هذا المستخدم غير موجود"]
                ]
            ]);
        }
        $user = $this->userModel->where('email',$token->email)->first();
        if (!$user) {
            return return_msg(false, 'user is not found', [
                'validation_errors' => [
                    "password" => ["هذا المستخدم غير موجود"]
                ]
            ]);
        }
        $user->password = bcrypt($data['password']);
        $user->save();

        PasswordReset::where('email',$user->email)->delete();


        return return_msg(true,"Success");



    }

}
