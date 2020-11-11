<?php

namespace App\Modules\User;

use App\Models\PasswordReset;
use App\Support\Repository;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class User
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
        $this->userModel = new UserModel;
    }

    //Create New User
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = $this->repository->create($this->userModel,$data);
        return return_msg(true, 'User Successfully Added', compact('user'));
    }

    //get All Users
    public function all()
    {
        $data = request()->all();
        $users = $this->userModel;
        // dd($data);
        if ($data['query'] ?? null){
            // dd($data);
            $users = $users->where('P_O_A_NAME' ,'like',"%".$data['query']."%")
                ->orWhere('P_O_MOBILE','like',"%".$data['query']."%")
                ->orWhere('P_O_CIVIL_ID','like',"%".$data['query']."%")
                ->orWhere('P_O_PASSPORT_NO','like',"%".$data['query']."%");
        }
        $users = $users->get();

        $users = custom_paginate($users,10);
        return return_msg(true, 'User Successfully Returned', compact('users'));
    }

    // Find User
    public function find($id)
    {
        $user = $this->repository->find($this->userModel, $id);
        if (!$user) {
            return return_msg(false, 'User Not Found');
        }
        return return_msg(true, 'User  Successfully Returned', compact('user'));
    }

    // Find UserByUserName
    public function findByUsername($userName)
    {
        $user = $this->userModel->where('username', $userName)->first();
        if (!$user) {
            return return_msg(false, 'User Not Found');
        }

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

//        $user-> = $data['mobile'] ?? null;
        $user->update($data);
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

    public function updateAuthData($data)
    {
        $user = auth('civil')->user();
        if (!$user){
            return return_msg(false,"Not Found");
        }
        $user->P_O_A_NAME = $data['P_O_A_NAME'] ?? null;
        $user->P_O_MOBILE = $data['P_O_MOBILE'] ?? null;
        $user->P_O_CIVIL_ID = $data['P_O_CIVIL_ID'] ?? null;
        $user->P_O_ADDRESS = $data['P_O_ADDRESS'] ?? null;
        $user->P_O_PASSPORT_NO = $data['P_O_PASSPORT_NO'] ?? null;
        $user->P_CIVIL_EXPIRY_DT = $data['P_CIVIL_EXPIRY_DT'] ?? null;
        ($data['password'] ?? null) ? $user->password = bcrypt($data['password']) : null;
        $user->save();
        return return_msg(true,"Success");
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
