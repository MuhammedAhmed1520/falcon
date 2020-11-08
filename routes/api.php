<?php

use Adldap\Laravel\Facades\Adldap;
use App\Models\Role;
use Carbon\Carbon;
use Faker\Provider\Base;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'user','namespace' => 'Auth'], function () {

    Route::post('/register','AuthController@register');
    Route::post('/login','AuthController@login');
});
Route::group(['prefix' => 'user-hospital','namespace' => 'Auth'], function () {

    Route::post('/register','AuthHospitalController@register');
    Route::post('/login','AuthHospitalController@login');
});

Route::group(['prefix' => 'falcon','namespace' => 'Api'], function () {

    Route::post('/create','FalconController@create');
    Route::post('/update','FalconController@update');
    Route::get('/find/{id}','FalconController@show');
    Route::get('/all','FalconController@all');
    Route::post('/deleteFile','FalconController@deleteFileDetail');
    Route::post('/delete','FalconController@delete');
    Route::post('/updateHospital','FalconController@updateHospital');
});
Route::group(['prefix' => 'utility','namespace' => 'Api'], function () {

    Route::get('/allOptions/{type?}','UtilityController@allOptions');
    Route::get('/testSoap','UtilityController@testSoap');
});



