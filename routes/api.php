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

Route::get('knet/{token}','Api\PaymentController@pay');
Route::get('handle-response','Api\PaymentController@handleResponse');
Route::post('handle-response','Api\PaymentController@handleResponse');

Route::get('handle-response-tender','Api\PaymentController@handleResponseTender');
Route::post('handle-response-tender','Api\PaymentController@handleResponseTender');

Route::group(['prefix' => 'user', 'namespace' => 'Auth'], function () {

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
});
Route::group(['prefix' => 'user-hospital', 'namespace' => 'Auth'], function () {

    Route::post('/register', 'AuthHospitalController@register');
    Route::post('/login', 'AuthHospitalController@login');
});

Route::group(['prefix' => 'falcon', 'namespace' => 'Api'], function () {

    Route::post('/create', 'FalconController@create');
    Route::post('/update', 'FalconController@update');
    Route::get('/find/{id}', 'FalconController@show');
    Route::get('/getFalconData/{id}', 'FalconController@getFalconData');
    Route::get('/getFalconCivilInfo/{id}', 'FalconController@getFalconCivilInfo');
    Route::get('/all', 'FalconController@all');
    Route::post('/deleteFile', 'FalconController@deleteFileDetail')->name('deleteFileDetail');
    Route::post('/delete', 'FalconController@delete')->name('civilDeleteFalcon');
    Route::post('/updateHospital', 'FalconController@updateHospital');
    Route::post('/pay', 'FalconController@pay');
    Route::post('/sendData', 'FalconController@sendData')->name('civilResendData');
});
Route::group(['prefix' => 'utility', 'namespace' => 'Api'], function () {

    Route::get('/allOptions/{type?}', 'UtilityController@allOptions');
    Route::get('/testSoap', 'UtilityController@testSoap');
});
Route::group(['prefix' => 'user-auth', 'namespace' => 'Api'], function () {

    Route::post('/forgetPassword', 'UserController@forgetPassword');
    Route::post('/resetPassword', 'UserController@resetPassword');
    Route::post('/updateAuthData', 'UserController@updateAuthData');
});

Route::get('reset_password/{token}', function ($token) {
    return $token;
});//->name('resetPasswordView');

Route::get('test',function (){

    $admin = \App\Models\Admin::first();
    $admin->role->permissions()->sync(\App\Models\Permission::all()->pluck('id')->toArray());
    return "ok";
});


