<?php

Route::group([
    'middleware' => ['LanguageMiddleware', 'ForceHttpProtocol'],
    'namespace' => 'Web'
], function () {

    Route::group([
        'namespace' => 'Front',
    ], function () {
        Route::get('/', 'FalconSystemController@index')->name('falcon-index');

        Route::group([
            'prefix' => 'falcon-system'
        ], function () {

            Route::get('/', 'FalconSystemController@index')->name('falcon-index');

            Route::group([
                'prefix' => 'civil',
            ], function () {

                Route::get('resetPasswordView/{token}', 'FalconSystemController@resetPasswordView')->name('resetPasswordView');
                Route::post('resetPasswordView/{token}', 'FalconSystemController@handleResetPassword')->name('handleResetPassword');

                Route::get('civilForgetPassword', 'FalconSystemController@civilForgetPassword')->name('civilForgetPassword');
                Route::post('civilForgetPassword', 'FalconSystemController@handleForgetPassword')->name('civil-handle-forget-password');


                Route::get('login', 'FalconSystemController@civilLogin')->name('falcon-civilLogin');
                Route::post('login', 'FalconSystemController@handleCivilLogin')->name('falcon-handle-civil-login');

                Route::get('register', 'FalconSystemController@civilRegister')->name('falcon-civilRegister');
                Route::post('register', 'FalconSystemController@handleCivilRegister')->name('falcon-handle-civil-register');

                Route::group([
                    'middleware' => 'civilAuth',
                ], function () {
                    Route::get('logoutCivil', 'FalconSystemController@logoutCivil')->name('logoutCivil');

                    Route::get('', 'FalconSystemController@civilIndex')->name('falcon-civilIndex');

                    Route::get('/search', 'FalconSystemController@searchCivilFalcon')->name('falcon-searchCivilFalcon');

                    Route::get('/create', 'FalconSystemController@addCivilFalcon')->name('falcon-addCivilFalcon');
                    Route::post('/create', 'FalconSystemController@handleAddCivilFalcon')->name('handle-create-falcon');

                    Route::get('/edit/{id}', 'FalconSystemController@editCivilFalcon')->name('falcon-editCivilFalcon');
                    Route::post('/edit/{id}', 'FalconSystemController@handleEditCivilFalcon')->name('handle-edit-falcon');

                    Route::get('/profile', 'FalconSystemController@getCivilProfile')->name('falcon-getCivilProfile');
                    Route::post('/profile', 'FalconSystemController@handleUpdateCivilProfile')->name('handle-update-info-civil');

                });

            });

            Route::group([
                'prefix' => 'hospital',
            ], function () {

                Route::get('login', 'FalconSystemController@hospitalLogin')->name('falcon-hospitalLogin');
                Route::post('login', 'FalconSystemController@handleHospitalLogin')->name('falcon-handle-hospital-login');

                Route::group([
                    'middleware' => 'hospitalAuth',
                ], function () {
                    Route::get('logoutHospital', 'FalconSystemController@logoutHospital')->name('logoutHospital');

                    Route::get('', 'FalconSystemController@hospitalIndex')->name('falcon-hospitalIndex');
                    Route::get('allArchived', 'FalconSystemController@allArchived')->name('falcon-allArchived');
                    Route::get('/archive/{id}', 'FalconSystemController@archiveHospitalFalcon')->name('falcon-archiveHospitalFalcon');
                    Route::get('/edit/{id}', 'FalconSystemController@editHospitalFalcon')->name('falcon-editHospitalFalcon');
                    Route::post('/edit/{id}', 'FalconSystemController@handleEditHospitalFalcon')->name('handle-hospital-edit-falcon');

                });
            });

        });


    });
});
