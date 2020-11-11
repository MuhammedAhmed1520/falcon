<?php

namespace App\Modules\Admin;

use App\Models\Admin as AdminModel;
use App\Support\Repository;
use Illuminate\Support\Facades\Hash;
use Adldap\Laravel\Facades\Adldap;

class Authentication
{



    /**
     * @var AdminModel $user
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

        $this->user = new AdminModel();
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

        $user = $this->globalRepository->create($this->user, $data);

        if (!$user) {

            return return_msg(false, 'something went wrong...', []);
        }

        auth()->login($user);

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
                'parameter' => 'username'
            ]);
        }

        $password_match = Hash::check($data['password'], $user->password);

        if (!$password_match) {

            return return_msg(false, 'wrong password', [
                'parameter' => 'password'
            ]);
        }

        $remember_me = isset($data['remember_me']) ? $data['remember_me'] : false;

        auth()->login($user, $remember_me);

        return return_msg(true, 'login done successfully', compact('user'));
    }

}
