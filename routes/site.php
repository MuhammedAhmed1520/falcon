<?php

Route::group([
    'middleware' => ['LanguageMiddleware', 'ForceHttpProtocol'],
    'namespace' => 'Web'
], function () {
    /**
     * violation frames
     */


    Route::group([
        'namespace' => 'Front'
    ], function () {
        Route::get('', 'FrontController@index')->name('frontIndex');
        Route::get('servicesGate', 'FrontController@servicesGate')->name('servicesGate');


        Route::group([
            'prefix' => 'violation-frames'
        ], function () {

            Route::get('enquiry', 'ViolationController@index')->name('violationEnquiry');
            Route::post('enquiry', 'ViolationController@handleViolationEnquiry')->name('handleViolationEnquiry');
            Route::get('enquiry-table', 'ViolationController@getEnquiryData')->name('violationEnquiryGetData');
            Route::get('enquiry-pay-violation/{id}', 'ViolationController@getEnquiryPayViolation')->name('getEnquiryPayViolation');
            Route::post('enquiry-pay-violation/{id}', 'ViolationController@handleEnquiryPayViolation')->name('handleEnquiryPayViolation');


        });

        Route::group([
            'prefix' => 'tender-frames',
        ], function () {

            Route::get('create-company', 'FrontController@tenderRegisterCompany')->name('frontTenderRegisterCompany');
            Route::get('reset-tender-code', 'FrontController@tenderResetCode')->name('frontTenderResetCode');

            Route::get('company-subscriptionPay/{code}', 'TenderController@subscriptionPay')->name('frontTendersubscriptionPayEnquiry');
            Route::get('company-appends/{type}', 'FrontController@tenderCompanyEnquiry')->name('frontTenderCompanyEnquiry');
            Route::get('tender-company-update-files/{code}', 'FrontController@tenderCompanyUpdateFiles')->name('frontTenderCompanyUpdateFiles');
            Route::get('tender-company-status/{code}', 'FrontController@tenderCompanyStatus')->name('frontTenderCompanyStatus');
            Route::get('company-appends/{type}', 'FrontController@tenderCompanyEnquiry')->name('frontTenderCompanyEnquiry');
            Route::get('tender-company-update-files/{code}', 'FrontController@tenderCompanyUpdateFiles')->name('frontTenderCompanyUpdateFiles');
            Route::get('all-tenders', 'FrontController@allTenders')->name('frontTenderAllTenders');
            Route::get('all-available-tenders', 'FrontController@availableTenders')->name('frontTenderAvailableTenders');
            Route::get('all-buyer-tenders', 'FrontController@rejectTenders')->name('frontTenderRejectTenders');
            Route::get('all-approved-tenders', 'FrontController@approveTenders')->name('frontTenderApprovedTenders');
            Route::get('tenders-show-tender/{id}', 'FrontController@showTenderDetails')->name('frontTenderShowTenderDetails');
            Route::get('tenders-show-tender-postpone/{id}', 'FrontController@showTenderDetailsPostpone')->name('frontTenderShowTenderDetailsPostpone');
            Route::get('view-tender-page/{id}', 'FrontController@showTenderPage')->name('frontTenderShowTenderPage');

            Route::post('tender-file-company-payment', 'TenderController@handleTenderFilePayment')->name('handleTenderFilePayment');
            Route::post('tender-postpone-request', 'TenderController@handleTenderPostponeRequest')->name('handleTenderPostponeRequest');

            Route::post('create-company', 'TenderController@handleTenderRegisterCompany')->name('handleTenderRegisterCompany');
            Route::post('reset-tender-code', 'TenderController@handleTenderResetCodeByMail')->name('handleTenderResetCodeByMail');
            Route::post('company-appends/{type}', 'TenderController@handleTenderCompanyEnquiry')->name('handleTenderCompanyEnquiry');
            Route::post('company-file-updates/{code}', 'TenderController@updateCompanyFiles')->name('frontUpdateCompanyFiles');
        });

        Route::group([
            'prefix' => 'violation-certificate-frames'
        ], function () {
            Route::get('/', 'CertificateController@index')->name('index-certificate');
            Route::get('certificate', 'CertificateController@create')->name('create-certificate');
            Route::get('certificate/{id}', 'CertificateController@find')->name('show-certificate');

            Route::post('certificate', 'CertificateController@store')->name('post-certificate');
            Route::post('certificate-filter', 'CertificateController@findBy')->name('certificate-filter');
            Route::get('certificate-update/{id}', 'CertificateController@edit')->name('update-certificate');
            Route::post('certificate-update/{id}', 'CertificateController@update')->name('post-update-certificate');

        });

        Route::group([
            'prefix' => 'industrial-frames'
        ], function () {
            Route::get('/', 'IndustrialController@index')->name('index-industrial');
            Route::post('/', 'IndustrialController@store')->name('submit-industrial');

        });

        Route::group([
            'prefix' => 'environmental-frames'
        ], function () {
            Route::get('/', 'EnvironmentalController@index')->name('index-environmental-request');
            Route::post('/', 'EnvironmentalController@handleCreateRequest')->name('handle-environmental-request');
        });

        Route::group([
            'prefix' => 'visits'
        ], function () {
            Route::get('/', 'VisitReserveController@index')->name('index-visit');
            Route::post('/', 'VisitReserveController@handleCreateRequest')->name('handle-create-visit');
        });

        Route::group([
            'prefix' => 'falcon-system'
        ], function () {
            Route::get('/', 'FalconSystemController@index')->name('falcon-index');

            Route::get('/', 'FalconSystemController@index')->name('falcon-index');

            Route::group([
                'prefix' => 'civil'
            ], function () {
                Route::get('', 'FalconSystemController@civilIndex')->name('falcon-civilIndex');

                Route::get('/search', 'FalconSystemController@searchCivilFalcon')->name('falcon-searchCivilFalcon');

                Route::get('/create', 'FalconSystemController@addCivilFalcon')->name('falcon-addCivilFalcon');
                Route::post('/create', 'FalconSystemController@handleAddCivilFalcon')->name('handle-create-falcon');

                Route::get('/edit/{id}', 'FalconSystemController@editCivilFalcon')->name('falcon-editCivilFalcon');
                Route::post('/edit/{id}', 'FalconSystemController@handleEditCivilFalcon')->name('handle-edit-falcon');

                Route::get('login', 'FalconSystemController@civilLogin')->name('falcon-civilLogin');
                Route::post('login', 'FalconSystemController@handleCivilLogin')->name('falcon-handle-civil-login');

                Route::get('register', 'FalconSystemController@civilRegister')->name('falcon-civilRegister');
                Route::post('register', 'FalconSystemController@handleCivilRegister')->name('falcon-handle-civil-register');

            });

            Route::group([
                'prefix' => 'hospital'
            ], function () {

                Route::get('login', 'FalconSystemController@hospitalLogin')->name('falcon-hospitalLogin');
                Route::post('login', 'FalconSystemController@handleHospitalLogin')->name('falcon-handle-hospital-login');

                Route::get('', 'FalconSystemController@hospitalIndex')->name('falcon-hospitalIndex');

                Route::get('/edit/{id}', 'FalconSystemController@editHospitalFalcon')->name('falcon-editHospitalFalcon');

            });

        });


        Route::group([
            'prefix' => 'office-agent-frames'
        ], function () {

            Route::group([
                'middleware' => 'auth:agent',
            ], function () {
                Route::get('/', 'officeAgentController@index')->name('index-office-agent');

                Route::post('payOfficeAgent', 'officeAgentController@payOfficeAgent')->name('payOfficeAgent');

                Route::post('/officeAgentUpdateInfo', 'officeAgentController@officeAgentUpdateInfo')->name('officeAgentUpdateInfo');
                Route::post('/officeAgentUpdateCompanyAttachment', 'officeAgentController@officeAgentUpdateCompanyAttachment')->name('officeAgentUpdateCompanyAttachment');
                Route::post('/officeAgentDeleteAttachment', 'officeAgentController@officeAgentDeleteAttachment')->name('officeAgentDeleteAttachment');

                Route::post('/handleCompanyAddPartenerRequest', 'officeAgentController@handleCompanyAddPartenerRequest')->name('handleCompanyAddPartenerRequest');
                Route::post('/officeAgentDeleteCompanyPartner', 'officeAgentController@officeAgentDeleteCompanyPartner')->name('officeAgentDeleteCompanyPartner');

                Route::post('/handleCompanyAddBranchRequest', 'officeAgentController@handleCompanyAddBranchRequest')->name('handleCompanyAddBranchRequest');
                Route::post('/officeAgentDeleteBranchAddress', 'officeAgentController@officeAgentDeleteBranchAddress')->name('officeAgentDeleteBranchAddress');

                Route::post('/AddHumanResourceEmployee', 'officeAgentController@AddHumanResourceEmployee')->name('AddHumanResourceEmployee');
                Route::post('/updateHumanResourceEmployee', 'officeAgentController@updateHumanResourceEmployee')->name('updateHumanResourceEmployee');
                Route::post('/deleteHumanResourceEmployeeRequest', 'officeAgentController@deleteHumanResourceEmployeeRequest')->name('deleteHumanResourceEmployeeRequest');
                Route::post('/officeAgentAddEmployeeAttachment', 'officeAgentController@officeAgentAddEmployeeAttachment')->name('officeAgentAddEmployeeAttachment');
                Route::post('/deleteHumanResourceFileRequest', 'officeAgentController@deleteHumanResourceFileRequest')->name('deleteHumanResourceFileRequest');

                Route::post('/officeAgentAddInstallment', 'officeAgentController@officeAgentAddInstallment')->name('officeAgentAddInstallment');
                Route::post('/officeAgentUpdateDevice', 'officeAgentController@officeAgentUpdateDevice')->name('officeAgentUpdateDevice');
                Route::post('/deleteInstallmentRequest', 'officeAgentController@deleteInstallmentRequest')->name('deleteInstallmentRequest');
                Route::post('/officeAgentAddInstallmentAttachment', 'officeAgentController@officeAgentAddInstallmentAttachment')->name('officeAgentAddInstallmentAttachment');
                Route::post('/deleteInstallmentAttachmentRequest', 'officeAgentController@deleteInstallmentAttachmentRequest')->name('deleteInstallmentAttachmentRequest');

                Route::post('/officeAgentAddStudy', 'officeAgentController@officeAgentAddStudy')->name('officeAgentAddStudy');
                Route::post('/deleteofficeAgentStudyRequest', 'officeAgentController@deleteofficeAgentStudyRequest')->name('deleteofficeAgentStudyRequest');

                Route::get('/getAgentCertify/{type}', 'officeAgentController@getAgentCertify')->name('getAgentCertify');
                Route::get('/reset_password', 'officeAgentController@reset_password')->name('reset_password-office-agent');
                Route::post('/reset_password', 'officeAgentController@handle_reset_password')->name('handle_reset_password-office-agent');
                Route::post('/sendFinalOfficeData', 'officeAgentController@sendFinalOfficeData')->name('sendFinalOfficeData');

                Route::get('/remove_asbestosis', 'officeAgentController@remove_asbestosis')->name('remove_asbestosis-office-agent');
                Route::post('/handle_remove_asbestosis', 'officeAgentController@handle_remove_asbestosis')->name('handle_remove_asbestosis');

                Route::get('/update_profile_office', 'officeAgentController@update_profile_office')->name('update-profile-info-office-agent');
                Route::post('/handle_update_profile_office', 'officeAgentController@handle_update_profile_office')->name('handle_update_profile_office');
            });

            Route::get('/main-activity', 'officeAgentController@mainActivity')->name('main-activity-office-agent');
            Route::get('/main-activity-pdf1', 'officeAgentController@mainActivityOne')->name('mainActivityOne');
            Route::get('/main-activity-pdf2', 'officeAgentController@mainActivityTwoThree')->name('mainActivityTwoThree');
            Route::get('/main-activity-pdf3', 'officeAgentController@mainActivityFour')->name('mainActivityFour');
            Route::get('/abort', 'officeAgentController@abort')->name('abortOfficeAgent');
            Route::get('/login', 'officeAgentController@login')->name('loginOfficeAgent');
            Route::get('/logout', 'officeAgentController@logoutOfficeAgent')->name('logoutOfficeAgent');
            Route::post('/login', 'officeAgentController@handleLoginRequest')->name('handleLoginRequest-office-agent');
            Route::get('/register', 'officeAgentController@register')->name('register-office-agent')->middleware('CloseRegisterOfficeAgentMiddleware');
            Route::get('/getpassword', 'officeAgentController@getPassword')->name('getpassword-office-agent')->middleware('CloseRegisterOfficeAgentMiddleware');
            Route::post('/getpassword', 'officeAgentController@handleGetPasswordRequest')->name('handleGetPasswordRequest-office-agent');
            Route::post('/register', 'officeAgentController@handleRegisterRequest')->name('handleRegisterRequest-office-agent')->middleware('CloseRegisterOfficeAgentMiddleware');

        });

        Route::get('client-reset-password/{token}', 'ClientController@getResetPasswordView')->name('clientResetPassword');//->middleware('can:show-visit');
        Route::post('client-reset-password', 'ClientController@getResetPasswordPost')->name('clientResetPasswordPost');//->middleware('can:show-visit');

    });
});
