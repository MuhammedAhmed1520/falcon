<?php

namespace App\Http\Controllers\Web\Admin;

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
        $this->authentication = new AuthCtrl;
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
        dd($request->all());
        $response = $this->authentication->login($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['errors'])->withInput();
        }
        $open_menu = 2;
        return redirect()->route('getDashboardView')->with('open_menu', $open_menu);
    }

    public function handleLogout()
    {
        auth()->user()->logs()->create([
            "type" => 'logout'
        ]);

        auth()->logout();
        return redirect()->route('getLoginView');
    }
}
