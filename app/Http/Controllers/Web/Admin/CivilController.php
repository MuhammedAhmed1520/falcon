<?php

namespace App\Http\Controllers\Web\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CivilController extends Controller
{
    private $civil;
    private $falcon;

    public function __construct()
    {
        $this->civil = new \App\Http\Controllers\Api\UserController();
        $this->falcon = new \App\Http\Controllers\Api\FalconController();
    }

    public function getCivilians(Request $request)
    {
        $page_title = 'civilians';
        $users = $this->civil->index()['data']['users'] ?? [];
        return view('pages.civilian.all.index', compact('page_title', 'users'));
    }

    public function showOrdersCivilian(Request $request, $id)
    {
        $page_title = 'civilians';
        $request->request->add(['user_id' => $id]);
        $falcons = $this->falcon->all($request)['data']['falcons'] ?? [];
//        return $falcons;
        return view('pages.civilian.orders.index', compact('page_title', 'user', 'falcons'));
    }

    public function editCivilian(Request $request, $id)
    {
        $page_title = 'civilians';
        $user = $this->civil->show($id)['data']['user'] ?? null;
        if (!$user) {
            return back()->with('error', 'Not Found');
        }
        return view('pages.civilian.edit.index', compact('page_title', 'user'));
    }

    public function handleEditCivilian(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $response = $this->civil->update($request, $id);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }
        return redirect()->route('getCivilians')->with('success', '');
    }


}
