<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Modules\User\AuthenticationHospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthHospitalController extends Controller
{

    /**
     */
    private $authentication;


    /**
     * @var User $user
     */
    private $user;


    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->authentication = new AuthenticationHospital();
        $this->user = new User();
    } // end constructor

    /**
     * login user...
     *
     * @param Request $request
     * @return array|null
     */
    public function login(Request $request)
    {

        // validate request
        $validation = $this->handleLoginValidation($request);

        if ($validation->fails()){

            return return_msg(false, 'validation error...', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->authentication->login($request->all());

    }
    public function register(Request $request)
    {

        // validate request
        $validation = $this->handleRegisterValidation($request);

        if ($validation->fails()){
            return return_msg(false, 'validation error...', [
                'validation_errors' => $validation->getMessageBag()->getMessages()
            ]);
        }
        return $this->authentication->register($request->all());

    }


    public function handleLoginValidation(Request $request)
    {

        return validator($request->all(), [
            'username' => 'required|min:1',
            'password' => 'required|min:6|max:20'
        ]);
    }
    public function handleRegisterValidation(Request $request)
    {

        return validator($request->all(), [
            'name' => 'required|string',
            'username' => 'required|unique:users_hospital,username',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'nullable|digits:8',
            'email' => 'nullable|email',
            'hospital_id' => 'required|numeric',
        ]);
    }

}
