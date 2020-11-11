<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'P_O_A_NAME', 'email', 'P_O_MOBILE',
        'password', 'P_O_CIVIL_ID', 'P_O_ADDRESS', 'P_O_PASSPORT_NO',
        'P_CIVIL_EXPIRY_DT', 'remember_token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
