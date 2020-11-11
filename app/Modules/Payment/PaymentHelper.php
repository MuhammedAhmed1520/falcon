<?php
/**
 * Created by PhpStorm.
 * User: Hammad
 * Date: 9/11/2019
 * Time: 2:01 PM
 */

namespace App\Modules\Payment;



use App\Models\Falcon;
use App\Modules\Falcon\FalconRepository;
use Carbon\Carbon;

trait PaymentHelper
{

    protected function updateMorph($pay,$knet)
    {
        $payment_type = $pay->paymentable_type;
        switch ($payment_type){
            case Falcon::class:
                $falcon = $pay->paymentable;

                $falconRepo = new FalconRepository();
                $falconRepo->sendSoap([
                   'P_REQUEST_TYP' => 6,
                   'P_O_CIVIL_ID' => $falcon->P_O_CIVIL_ID,
                   'P_PAYMENT_ID' => $knet['payment_id'] ?? null,
                   'P_AMOUNT' => $knet['amount'] ?? null,
                   'P_TRANS_ID' => $knet['tran_id'] ?? null,
                   'P_TRACK_ID' => $knet['track_id'] ?? null,
                ]);

                break;
            default:
                break;
        }




    }


}
