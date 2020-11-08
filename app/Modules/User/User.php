<?php

namespace App\Modules\User;

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
            $users = $users->where('name' ,'like',"%".$data['query']."%")
                ->orWhere('username','like',"%".$data['query']."%");
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

}
