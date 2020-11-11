<?php

namespace App\Http\Controllers\Web\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CivilController extends Controller
{
    private $civil;

    public function __construct()
    {
        $this->civil = new \App\Http\Controllers\Api\UserController();
    }

    public function getCivilians(Request $request)
    {
        $page_title = 'civilians';
        $users = $this->civil->index()['data']['users'] ?? [];
        return view('pages.civilian.all.index', compact('page_title', 'users'));
    }


}
