<?php

namespace App\Http\Controllers\Web\Visit;

use App\Http\Controllers\Api\EnvironmentalRequestController;
use App\Http\Controllers\Api\UtilityController;
use App\Http\Controllers\Api\VisitReserveController as VisitReserveCTRL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VisitReserveController extends Controller
{
    private $visitReserveCTRL;
    private $utilityController;

    public function __construct()
    {
        $this->visitReserveCTRL = new VisitReserveCTRL();
        $this->utilityController = new UtilityController();
    }
    public function index(Request $request)
    {
        $page_title = 'ALL Visit Requests';
        $visits = $this->visitReserveCTRL->index($request)['data']['visits'];
        return view('pages.visits.all.index', compact('visits', 'page_title'));
    }


    public function show(Request $request, $token)
    {

        $page_title = 'Show Visit ';
        $response = $this->visitReserveCTRL->show($token);

        $visit = $response['data']['visit'] ?? null;

        if (!$visit) {
            return back()->with('error', __('violation.error'));
        }

        return view('pages.visits.edit.index', compact('visit', 'page_title'));
    }



    public function delete(Request $request)
    {
        return $this->visitReserveCTRL->destroy($request->id);
    }
    public function approve(Request $request)
    {
        return $this->visitReserveCTRL->approve($request->token);
    }

}
