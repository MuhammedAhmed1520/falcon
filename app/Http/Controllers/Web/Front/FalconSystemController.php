<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\FalconController;
use App\Http\Controllers\Api\UtilityController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthHospitalController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FalconSystemController extends Controller
{

    private $auth_civil;
    private $auth_hospital;
    private $falcon_ctrl;
    private $utility_ctrl;

    public function __construct()
    {
        $this->falcon_ctrl = new FalconController();
        $this->auth_civil = new AuthController();
        $this->auth_hospital = new AuthHospitalController();
        $this->utility_ctrl = new UtilityController();
    }

    public function index()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.index.index', compact('is_active'));
    }

    public function civilLogin()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.login', compact('is_active'));
    }

    public function handleCivilLogin(Request $request)
    {

        $response = $this->auth_civil->login($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }
        $user = $response['data']['user'];
        auth('civil')->login($user);
        return redirect()->route('falcon-civilIndex')->with('success', 'تمت العملية بنجاح');

    }

    public function civilRegister()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.register', compact('is_active'));
    }

    public function handleCivilRegister(Request $request)
    {

        $response = $this->auth_civil->register($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }
        $user = $response['data']['user'];
        auth('civil')->login($user);
        return redirect()->route('falcon-civilIndex')->with('success', 'تمت العملية بنجاح');

    }

    public function civilIndex(Request $request)
    {
        $is_active = 1;
        $falcons = $this->falcon_ctrl->all($request)['data']['falcons'] ?? [];
        return view('frontsite.pages.falconSystem.civil.all', compact('is_active', 'falcons'));
    }

    public function addCivilFalcon()
    {
        $is_active = 1;
        $helper_utilities = $this->utility_ctrl->allOptions()['data']['options']->groupBy('type');
        return view('frontsite.pages.falconSystem.civil.add', compact('is_active', 'helper_utilities'));
    }

    public function handleAddCivilFalcon(Request $request)
    {
        return $this->falcon_ctrl->create($request);
        $response = $this->falcon_ctrl->create($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }
        return redirect()->route('falcon-civilIndex')->with('success', 'تمت العملية بنجاح');
    }

    public function searchCivilFalcon(Request $request)
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.search', compact('is_active'));
    }

    public function editCivilFalcon($id)
    {
        $is_active = 1;
        $falcon = $this->falcon_ctrl->show($id)['data']['falcon'] ?? null;
        $helper_utilities = $this->utility_ctrl->allOptions()['data']['options']->groupBy('type');
        if (!$falcon) {
            return back()->with('error', 'غير موجود');
        }
//        return $falcon;
        return view('frontsite.pages.falconSystem.civil.edit', compact('is_active', 'falcon', 'helper_utilities'));
    }

    public function handleEditCivilFalcon(Request $request, $id)
    {

        $request->request->add(['id' => $id]);
        return $this->falcon_ctrl->update($request);
        $response = $this->falcon_ctrl->update($request);
//        return $response;
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }
        return redirect()->route('falcon-civilIndex')->with('success', 'تمت العملية بنجاح');
    }

    public function hospitalLogin()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.hospital.login', compact('is_active'));
    }

    public function handleHospitalLogin(Request $request)
    {

        $response = $this->auth_hospital->login($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'] ?? [])->withInput();
        }
        $user = $response['data']['user'];
        auth('hospital')->login($user);
        return redirect()->route('falcon-hospitalIndex')->with('success', 'تمت العملية بنجاح');
    }

    public function hospitalIndex()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.hospital.all', compact('is_active'));
    }

    public function editHospitalFalcon(Request $request, $id)
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.hospital.edit', compact('is_active'));
    }

}
