<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\CivilianController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CivilController
 * @package App\Http\Controllers\Web\Violation
 */
class CivilController extends Controller
{
    /**
     * @var CivilianController
     */
    private $civilian;

    /**
     * CivilController constructor.
     */
    public function __construct()
    {
        $this->civilian = new CivilianController();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllCivilians(Request $request)
    {
        $page_title = 'ALL Civilians';

        $civilians = collect([]);
        $response = $this->civilian->index($request);
        if ($response['status']) {
            $civilians = $response['data']['civilians'];
        }

        $civilians = custom_paginate($civilians);

        return view('pages.violation.civilian.all.index', compact('page_title', 'civilians'));
    }

}
