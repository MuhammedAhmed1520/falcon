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

}
