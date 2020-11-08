<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Falcon extends Model
{
    protected $fillable = [
        'P_REQUEST_TYP', 'P_O_CIVIL_ID', 'P_O_A_NAME',
        'P_O_ADDRESS', 'P_O_MOBILE', 'P_O_PASSPORT_NO',
        'P_CIVIL_EXPIRY_DT', 'P_O_MAIL', 'P_NW_CIVIL_ID',
        'P_NW_A_NAME', 'P_NW_ADDRESS', 'P_NW_MOBILE',
        'P_NW_PASSPORT_NO', 'P_NW_CIVIL_EXPIRY', 'P_NW_O_MAIL',
        'P_CUR_PASS_FAL', 'P_FAL_SEX', 'P_FAL_SPECIES',
        'P_FAL_TYPE', 'P_FAL_OTHER_TYPE', 'P_FAL_ORIGIN_COUNTRY',
        'P_FAL_CITES_NO', 'P_FAL_PIT_NO', 'P_FAL_RING_NO',
        'P_FAL_INJ_DATE', 'P_FAL_INJ_HOSPITAL', 'P_PAYMENT_ID',
        'P_AMOUNT', 'P_TRANS_ID', 'P_TRACK_ID', 'P_OUT_REQUEST_NO',
        'P_STATUS_MSG', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order_type()
    {
        return $this->belongsTo(Option::class,'P_REQUEST_TYP');
    }
    public function type()
    {
        return $this->belongsTo(Option::class,'P_REQUEST_TYP');
    }
    public function fal_type()
    {
        return $this->belongsTo(Option::class,'P_FAL_TYPE');
    }
    public function origin_country()
    {
        return $this->belongsTo(Option::class,'P_FAL_ORIGIN_COUNTRY');
    }
    public function fal_city()
    {
        return $this->belongsTo(Option::class,'P_FAL_CITES_NO');
    }
    public function hospital()
    {
        return $this->belongsTo(Option::class,'P_FAL_INJ_HOSPITAL');
    }

    public function file_details()
    {
        return $this->hasMany(FalconFileDetail::class,'falcon_id');
    }
}
