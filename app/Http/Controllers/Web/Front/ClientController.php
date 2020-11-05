<?php

namespace App\Http\Controllers\Web\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    private  $clientCTRL;
    public function __construct()
    {
        $this->clientCTRL = new \App\Http\Controllers\Api\ClientController();
    }

    public function getResetPasswordView($token)
    {
        return view('frontsite.pages.client.reset_password',compact('token'));
    }
    public function getResetPasswordPost(Request $request)
    {
        $response = $this->clientCTRL->resetPassword($request);
        if (!$response['status']){
            return back()->withInput()->withErrors($response['data']['validation_errors'] ?? []);
        }
        return back()->with('success', 'تم اعادة تعيين كلمة المرور بنجاح');

    }
}
