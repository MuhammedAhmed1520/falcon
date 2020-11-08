<?php

namespace App\Modules\User;

use App\Models\UserHospital as UserModel;
use App\Support\Repository;
use Illuminate\Support\Facades\Hash;
use Adldap\Laravel\Facades\Adldap;

class AuthenticationHospital
{



    /**
     * @var UserModel $user
     */
    private $user;


    /**
     * @var Repository $globalRepository
     */
    private $globalRepository;


    /**
     * Authentication constructor.
     */
    public function __construct()
    {

        $this->user = new UserModel();
        $this->globalRepository = new Repository();
    }


    /**
     * register new user...
     *
     * @param array $data
     * @return array|null
     */
    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = $this->globalRepository->create($this->user, $data);

        if (!$user) {

            return return_msg(false, 'something went wrong...', []);
        }

        auth('hospital')->login($user);

        return return_msg(true, 'register done successfully', compact('user'));
    }


    /**
     * login user...
     *
     * @param array $data
     * @return array|null
     */
    public function login(array $data)
    {
        $user = $this->globalRepository->findSingleWhere($this->user, [
            ['username' => $data['username']]
        ]);

        if (!$user) {
            return return_msg(false, 'user is not found', [
                'validation_errors' => [
                    "username" => ["هذا المستخدم غير موجود"]
                ]
            ]);
        }

        $password_match = Hash::check($data['password'], $user->password);

        if (!$password_match) {

            return return_msg(false, 'wrong password', [
                'validation_errors' => [
                    "username" => ["كلمة المرور غير صحيحة"]
                ]
            ]);
        }

        $remember_me = isset($data['remember_me']) ? $data['remember_me'] : false;

        auth('hospital')->login($user, $remember_me);

        return return_msg(true, 'login done successfully', compact('user'));
    }

}
