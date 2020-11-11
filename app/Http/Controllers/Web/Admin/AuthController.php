<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Auth\AuthAdminController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController as AuthCtrl;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authentication;


    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->authentication = new AuthAdminController();
    } // end constructor

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoginView()
    {
        $page_title = 'login';
        return view('pages.auth.login.index', compact('page_title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLogin(Request $request)
    {
        $response = $this->authentication->login($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['errors'])->withInput();
        }
//        return $response;
//        $admin = $response['data']['user'];
//        if ($admin) {
//            auth()->login($admin);
//        }
        return redirect()->route('getDashboardView');
    }

    public function handleLogout()
    {
        $user = auth()->user();

        if ($user) {
            auth()->logout();
        }

        return redirect()->route('getLoginView');
    }
}
