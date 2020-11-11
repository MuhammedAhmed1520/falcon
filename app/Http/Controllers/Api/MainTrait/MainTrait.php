<?php

namespace App\Http\Controllers\Api\MainTrait;


trait MainTrait
{
    //Valid Create Request Of Role
    public function CreateRoleRequest(array $request_data)
    {
        return validator($request_data, [
            'title' => 'required|string|unique:roles,title',
            'permissions.*' => 'nullable|numeric|exists:permissions,id'
        ]);
    }

    //Valid Update Request Of Role
    public function UpdateRoleRequest(array $request_data)
    {
        return validator($request_data, [
            'title' => 'required|string|unique:roles,title,' . $request_data['id'],
            'permissions.*' => 'nullable|numeric|exists:permissions,id'
        ]);
    }



    public function CreateUserRequest(array $request_data)
    {
        return validator($request_data, [
            'name' => 'required|min:3|string',
//            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'mobile' => 'nullable|digits:8',
            'email' =>  'required|email|unique:users,email',
            'hospital_id' =>  'required|numeric',
        ]);
    }

    public function UpdateUserRequest(array $request_data)
    {
        return validator($request_data, [
            'name' => 'nullable|min:3|string',
            'email' => 'required|unique:users,id,' . $request_data['id'],
            'password' => 'nullable|min:6',
            'mobile' => 'nullable|digits:8',
            'hospital_id' =>  'required|numeric',

        ]);
    }
    public function UpdateUserCivilRequest(array $request_data)
    {
        return validator($request_data, [
            'P_O_A_NAME' => 'required|string',
            'P_O_MOBILE' => 'required|numeric|digits:8',
            'email' => 'required|email|unique:users,id' . $request_data['id'],
            'P_O_CIVIL_ID' => 'required|numeric|digits:12|unique:users,P_O_CIVIL_ID,id'.$request_data['id'],
            'P_O_ADDRESS' => 'required',
            'P_O_PASSPORT_NO' => 'required',
            'P_CIVIL_EXPIRY_DT' => 'required|date',

        ]);
    }

    public function UpdatePasswordRequest(array $request_data)
    {
        return validator($request_data, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6|max:20',
        ]);
    }
    public function UpdateAuthUserRequest(array $request_data)
    {
        return validator($request_data, [
            'P_O_A_NAME' => 'required|string',
            'P_O_MOBILE' => 'required|numeric|digits:8',
            'P_O_CIVIL_ID' => 'required|numeric|digits:12',
            'P_O_ADDRESS' => 'required',
            'P_O_PASSPORT_NO' => 'required',
            'P_CIVIL_EXPIRY_DT' => 'required|date',
            'password' => 'nullable|min:6|confirmed',
        ]);
    }
    public function forgetPasswordRequest(array $request_data)
    {
        return validator($request_data, [
            'email' => 'required|email',

        ]);
    }
    public function resetPasswordRequest(array $request_data)
    {
        return validator($request_data, [
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    public function CreateAdminRequest(array $request_data)
    {
        return validator($request_data, [
            'name' => 'nullable|min:1|string',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'mobile' => 'nullable|digits:8',
            'role_id' => 'required|exists:roles,id',
        ]);
    }

    public function UpdateAdminRequest(array $request_data)
    {
        return validator($request_data, [
            'name' => 'nullable|min:1|string',
            'username' => 'nullable|unique:users,id,' . $request_data['id'],
            'password' => 'nullable|min:6',
            'mobile' => 'nullable|digits:8',
            'role_id' => 'required|exists:roles,id',
        ]);
    }

}
