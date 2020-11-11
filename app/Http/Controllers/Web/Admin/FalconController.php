<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FalconController extends Controller
{
    private $falcon;
    private $utility_ctrl;

    public function __construct()
    {
        $this->falcon = new \App\Http\Controllers\Api\FalconController();
        $this->utility_ctrl = new UtilityController();
    }

    public function getAllFalconsCivilians(Request $request)
    {
        $page_title = 'Falcons';
        $falcons = $this->falcon->all($request)['data']['falcons'] ?? [];
//        return $falcons;
        return view('pages.falcon.all.index', compact('page_title', 'users', 'falcons'));
    }

    public function getEditFalconsCivilians(Request $request, $id)
    {
        $page_title = 'Edit Falcons';
        $helper_utilities = $this->utility_ctrl->allOptions()['data']['options']->groupBy('type');
        $falcon = $this->falcon->show($id)['data']['falcon'] ?? null;
        if (!$falcon) {
            return back()->with('error', 'Not Found');
        }

        return view('pages.falcon.edit.index', compact('page_title', 'falcon', 'helper_utilities'));

    }


    public function handleEditFalconsCivilians(Request $request, $id)
    {

        $request->request->add(['id' => $id]);
        return $this->falcon->update($request);
    }

}
