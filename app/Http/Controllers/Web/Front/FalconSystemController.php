<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\VisitReserveController as VisitReserveCTRL;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FalconSystemController extends Controller
{

    public function __construct()
    {
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

        return $request->all();
    }

    public function civilRegister()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.register', compact('is_active'));
    }

    public function handleCivilRegister(Request $request)
    {

        return $request->all();
    }

    public function civilIndex()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.all', compact('is_active'));
    }

    public function addCivilFalcon()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.add', compact('is_active'));
    }

    public function handleAddCivilFalcon(Request $request)
    {

        return $request->all();
    }

    public function searchCivilFalcon(Request $request)
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.search', compact('is_active'));
    }

    public function editCivilFalcon($id)
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.civil.edit', compact('is_active'));
    }

    public function handleEditCivilFalcon(Request $request, $id)
    {

        return $request->all();
    }

    public function hospitalLogin()
    {
        $is_active = 1;
        return view('frontsite.pages.falconSystem.hospital.login', compact('is_active'));
    }

    public function handleHospitalLogin(Request $request)
    {

        return $request->all();
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
