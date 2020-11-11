<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * languages middleware routes
 */

Route::group([
    'middleware' => ['LanguageMiddleware', 'ForceHttpProtocol'],
    'namespace' => 'Web',
    'prefix' => 'admin'
], function () {

    /**
     * public routes
     */
    Route::group([
        'namespace' => 'Admin'
    ], function () {

        Route::get('ar', 'SettingsController@setAr')->name('setAr');
        Route::get('en', 'SettingsController@setEn')->name('setEn');

//        Route::get('', 'AuthController@getLoginView');
        Route::get('login', 'AuthController@getLoginView')->name('getLoginView');
        Route::post('login', 'AuthController@handleLogin')->name('handleLogin');

        Route::get('logout', 'AuthController@handleLogout')->name('handleLogout');


    });


    /**
     * auth routes
     */
    Route::group([
        'middleware' => 'auth'
    ], function () {

        /**
         * setting routes
         */
        Route::group([
            'namespace' => 'Admin'
        ], function () {
            Route::get('', 'DashboardController@getDashboard');
            Route::get('home', 'DashboardController@getDashboard')->name('getDashboardView');
            Route::get('getPayments', 'DashboardController@getPayments')->name('getPaymentsView')->middleware('can:payments');


            /**
             * roles module routes
             */
            Route::group([
                'prefix' => 'civilians',
            ], function () {
//
                Route::get('all-civilians', 'CivilController@getCivilians')->name('getCivilians')->middleware('can:all-civilians');
                Route::get('orders-civilians/{id}', 'CivilController@showOrdersCivilian')->name('showOrdersCivilian')->middleware('can:show-civil');
                Route::get('edit-civilians/{id}', 'CivilController@editCivilian')->name('editCivilian')->middleware('can:edit-civil');
                Route::put('edit-civilians/{id}', 'CivilController@handleEditCivilian')->name('handleEditCivilian')->middleware('can:show-civil-order');
//
            });

            /**
             * roles module routes
             */
            Route::group([
                'prefix' => 'orders',
            ], function () {
//
                Route::get('all-falcons', 'FalconController@getAllFalconsCivilians')->name('getAllFalconsCivilians')->middleware('can:show-all-falcon');
                Route::get('edit-falcons/{id}', 'FalconController@getEditFalconsCivilians')->name('getEditFalconsCivilians')->middleware('can:show-falcon');
                Route::post('edit-falcons/{id}', 'FalconController@handleEditFalconsCivilians')->name('handleEditFalconsCivilians')->middleware('can:edit-falcon');
//
            });

            /**
             * roles module routes
             */
            Route::group([
                'prefix' => 'roles',
                'middleware' => 'can:main-settings'
            ], function () {
//
                Route::get('all-roles', 'RoleController@index')->name('allRoles');
                Route::get('add-role', 'RoleController@create')->name('addRoles')->middleware('can:create-role');
                Route::post('add-role', 'RoleController@store')->name('handleAddRole')->middleware('can:create-role');
                Route::get('edit-role/{id}', 'RoleController@edit')->name('editRole')->middleware('can:edit-role');
                Route::get('get-role-users/{id}', 'RoleController@getRoleUsers')->name('getRoleUsers');
                Route::put('edit-role/{id}', 'RoleController@update')->name('handleEditRole')->middleware('can:edit-role');
                Route::delete('delete-role', 'RoleController@delete')->name('handleDeleteRole')->middleware('can:delete-role');
//
            });
//
//
            /**
             * user module routes
             */
            Route::group([
                'prefix' => 'users',
                'middleware' => 'can:main-settings'
            ], function () {
//
                Route::get('all-users', 'UserController@index')->name('allUsers');
                Route::get('add-user', 'UserController@create')->name('addUsers')->middleware('can:create-user');
                Route::post('add-user', 'UserController@store')->name('handleAddUser')->middleware('can:create-user');
                Route::get('edit-user/{id}', 'UserController@edit')->name('editUser');
                Route::put('edit-user/{id}', 'UserController@update')->name('handleEditUser');
                Route::delete('delete-user', 'UserController@delete')->name('handleDeleteUser');
//
            });
//
            /**
             * user module routes
             */
            Route::group([
                'prefix' => 'users',
            ], function () {

                Route::get('change-password', 'UserController@changePassword')->name('changePassword');
                Route::put('handleUpdateUserPassword/{id}', 'UserController@handleUpdateUserPassword')->name('handleUpdateUserPassword');

            });

        });
//
//
    });


});
