<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnetPayment extends Model
{
    //
    protected $table ='knet_payments';
    protected $fillable = ['id',
        'payment_id','result','auth','avr',
        'ref','tran_id','post_date','track_id'
        ,'amount',
        'auth_code','pay_id'];
    public function payment(){
        return $this->belongsTo(Payment::class,'pay_id');
    }
}

