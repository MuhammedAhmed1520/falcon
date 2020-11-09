<?php

namespace App\Http\Controllers\Api\MainTrait;


trait MainTrait
{



    public function CreateUserRequest(array $request_data)
    {
        return validator($request_data, [
            'name' => 'required|min:3|string',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'mobile' => 'nullable|digits:8',
            'email' => 'nullable|email',
        ]);
    }

    public function UpdateUserRequest(array $request_data)
    {
        return validator($request_data, [
            'name' => 'nullable|min:3|string',
            'username' => 'nullable|unique:users,id,' . $request_data['id'],
            'password' => 'nullable|min:6',
            'mobile' => 'nullable|digits:8',
            'email' => 'nullable|email',

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

}
