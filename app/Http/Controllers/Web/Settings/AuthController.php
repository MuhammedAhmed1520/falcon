<?php

namespace App\Http\Controllers\Web\Settings;

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
//      $domainName = 'dc=approc,dc=com';
//        $domainName = env('LDAP_BASE_DN');
////        dd($domainName);
//        $d = explode('dc=' , $domainName);
//        $fulldomain = str_replace(',','.',implode('',$d));
//        dd($fulldomain);

        $page_title = 'login';
//        $username = exec('whoami');
//
//        if ($username) {
//            $username = str_after($username, '\\');
//        }
//        if ($username) {
//            $user = User::where('username', $username .'@'.$fulldomain)->first();
////            dd($username);
//            if ($user) {
//                \auth()->login($user);
//                $open_menu = 2;
//                return redirect()->route('getDashboardView')->with('open_menu', $open_menu);
//            }
//        }
        return view('pages.auth.login.index', compact('page_title'));
    }
    public function getLocalLoginView(){
        $page_title = 'login';
        return view('pages.auth.login_local.index', compact('page_title'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLogin(Request $request)
    {
//        dd($request);
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
