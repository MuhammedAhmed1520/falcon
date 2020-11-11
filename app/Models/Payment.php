<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    protected $fillable=['id','name','phone','email','token',
        'cost','status','link','check_info','paymentable_type','paymentable_id'
        ,'callback'
    ];
    protected $hidden = ['knet'];
    protected $appends =['knet_data','type','payed_at'];

    public function knet(){
        return $this->hasOne(KnetPayment::class,'pay_id');
    }

    public function getKnetDataAttribute(){
        return $this->knet()->first();
    }

    public function paymentable(){
        return $this->morphTo();
    }


    public function getTypeAttribute()
    {
        $payment_type = str_replace('App\Models\\' , '' , $this->paymentable_type) ;
        return __('violation.'.$payment_type);
    }
    public function getPayedAtAttribute()
    {
        return $this->paymentable()->first()->payed_at ?? '';
    }

}
