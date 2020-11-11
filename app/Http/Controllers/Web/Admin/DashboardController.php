<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
    }

    public function getDashboard(Request $request)
    {
        $page_title = 'Dashboard';
        return view('pages.dashboard.all.index', compact('page_title'));
    }


    public function getPayments(Request $request)
    {
        $page_title = 'Payments';
        $payments = Payment::orderBy('id', 'desc')->get();
        $payments = $this->filter($payments, $request->all());
        $payments = $payments->sortByDesc(function ($item){
            return $item['paid_at'];
        });
        return view('pages.settings.payments.all.index', compact('page_title', 'payments', 'paymentable_types'));
    }

    public function filter($payments, array $data)
    {
        if ($data['start_date'] ?? null) {
            $start_date = Carbon::parse($data['start_date']);
            $payments = $payments->filter(function ($element) use ($start_date) {
                $element_date = Carbon::parse($element['created_at']);
                return $element_date->gte($start_date);
            });
        }
        if ($data['end_date'] ?? null) {
            $end_date = Carbon::parse($data['end_date']);
            $payments = $payments->filter(function ($element) use ($end_date) {
                $element_date = Carbon::parse($element['created_at']);
                return $element_date->lte($end_date);
            });
        }
        if ($data['amount'] ?? null) {
            $payments = $payments->filter(function ($element) use ($data) {
                return $data['amount'] == $element['cost'];
            });
        }
        if ($data['status'] ?? null) {
            if ($data['status'] != "ALL") {
                $payments = $payments->filter(function ($element) use ($data) {
                    return $data['status'] == ($element['knet_data']['result'] ?? null);
                });
            }
        }
        if ($data['type'] ?? null) {
            if ($data['type'] != "ALL") {
                $payments = $payments->filter(function ($element) use ($data) {
                    $e = str_replace('App\Models\\', '', $element['paymentable_type']);
                    return $e == $data['type'];
                });
            }
        }
        if ($data['payment_type'] ?? null) {
            if ($data['payment_type'] != "ALL") {
                $payments = $payments->filter(function ($element) use ($data) {
                    if ($data['payment_type'] == "CASH") {
                        if ($element['status'] == "1" && $element['knet_data'] == null) {
                            return $element;
                        }

                    } else {
                        return $element['knet_data'] != null;
                    }
                });
            }
        }
        return $payments;
    }

}
