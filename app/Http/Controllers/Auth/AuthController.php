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
            'P_O_A_NAME' => 'required|string',
            'password' => 'required|min:6|confirmed',
            'P_O_MOBILE' => 'required|numeric|digits:8',
            'email' => 'required|email|unique:users,email',
//            'P_O_CIVIL_ID' => 'required|numeric|digits:12',
            'P_O_CIVIL_ID' => 'required|numeric|digits:12|unique:users,P_O_CIVIL_ID',
            'P_O_ADDRESS' => 'required',
            'P_O_PASSPORT_NO' => 'required',
            'P_CIVIL_EXPIRY_DT' => 'required|date',
        ]);
    }

}
