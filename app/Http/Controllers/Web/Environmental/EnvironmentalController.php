<?php

namespace App\Http\Controllers\Web\Environmental;

use App\Http\Controllers\Api\EnvironmentalRequestController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EnvironmentalController extends Controller
{
    //
    private $environmentalRequestsController;
    private $utilityController;

    public function __construct()
    {
        $this->environmentalRequestsController = new EnvironmentalRequestController();
        $this->utilityController = new UtilityController();
    }

    public function index(Request $request)
    {
        $page_title = 'ALL Environmental Requests';
        $environmentalRequests = $this->environmentalRequestsController->index($request)['data']['data'];
        return view('pages.environmentalRequests.all.index', compact('environmentalRequests', 'page_title'));
    }


    public function edit(Request $request, $token)
    {

        $page_title = 'Edit Environmental Requests';
        $response = $this->environmentalRequestsController->show($token);

        $environmentalRequest = $response['data']['data'] ?? null;

        if (!$environmentalRequest) {
            return back()->with('error', __('violation.error'));
        }

        return view('pages.environmentalRequests.edit.index', compact('environmentalRequest', 'page_title'));
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
 
        $response = $this->environmentalRequestsController->update($request);

        if (!$response['status']) {
            $errors = $response['data']['validation_errors'];
            return back()->withErrors($errors)->withInput();
        }

        return redirect()->route('allEnvironmentalRequests')->with('success', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        return $this->environmentalRequestsController->destroy($request->id);
    }

}
