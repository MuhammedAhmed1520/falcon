<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FalconController extends Controller
{
    private $falcon;

    public function __construct()
    {
        $this->falcon = new \App\Http\Controllers\Api\FalconController();
    }

    public function getAllFalconsCivilians(Request $request)
    {
        $page_title = 'Falcons';
        $falcons = $this->falcon->all($request)['data']['falcons'] ?? [];
//        return $falcons;
        return view('pages.falcon.all.index', compact('page_title', 'users', 'falcons'));
    }


}
