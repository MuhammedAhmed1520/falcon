<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Modules\User\Authentication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    /**
     * @var Authentication $authentication
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
        $this->authentication = new Authentication();
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
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
    }
    public function handleRegisterValidation(Request $request)
    {

        return validator($request->all(), [
            'name' => 'required|string',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'nullable|digits:8',
            'email' => 'required|email',
        ]);
    }

}
