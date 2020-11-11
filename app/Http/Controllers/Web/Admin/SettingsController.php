<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function __construct()
    {
    }

    public function setAr()
    {
        config('app')['locale'] == 'ar';
        session(['current_lang' => 'ar']);
        return back();
    }

    public function setEn()
    {
        config('app')['locale'] == 'en';
        session(['current_lang' => 'en']);
        return back();
    }
}
