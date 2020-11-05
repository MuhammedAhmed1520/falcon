<?php

Route::group([
    'middleware' => ['LanguageMiddleware', 'ForceHttpProtocol'],
    'namespace' => 'Web'
], function () {

    Route::group([
        'namespace' => 'Portal'
    ], function () {


        Route::group([
            'prefix' => 'violation-portal-frames'
        ], function () {

            Route::get('enquiry-portal', 'ViolationController@index')->name('violationEnquiryPortal');
            Route::post('enquiry-portal', 'ViolationController@handleViolationEnquiry')->name('handleViolationEnquiryPortal');
            Route::get('enquiry-table-portal', 'ViolationController@getEnquiryData')->name('violationEnquiryGetDataPortal');
            Route::get('enquiry-pay-violation-portal/{id}', 'ViolationController@getEnquiryPayViolation')->name('getEnquiryPayViolationPortal');
            Route::post('enquiry-pay-violation-portal/{id}', 'ViolationController@handleEnquiryPayViolation')->name('handleEnquiryPayViolationPortal');


        });

        Route::group([
            'prefix' => 'tab-portal-frames',
        ], function () {

            Route::get('getOfficeAgentViewPortal', 'FrontController@getOfficeAgentView')->name('getOfficeAgentViewPortal');
        });

        Route::group([
            'prefix' => 'violation-certificate-portal-frames'
        ], function () {
            Route::get('/', 'CertificateController@index')->name('index-portal-certificate');
            Route::get('certificate', 'CertificateController@create')->name('create-portal-certificate');
            Route::get('certificate/{id}', 'CertificateController@find')->name('show-portal-certificate');

            Route::post('certificate', 'CertificateController@store')->name('post-portal-certificate');
            Route::post('certificate-filter', 'CertificateController@findBy')->name('certificate-portal-filter');
            Route::get('certificate-update/{id}', 'CertificateController@edit')->name('update-portal-certificate');
            Route::post('certificate-update/{id}', 'CertificateController@update')->name('post-update-portal-certificate');

        });

        Route::group([
            'prefix' => 'industrial-portal-frames',
        ], function () {

            Route::get('/', 'IndustrialController@index')->name('index-portal-industrial');
            Route::post('/', 'IndustrialController@store')->name('submit-portal-industrial');
        });

        Route::group([
            'prefix' => 'tender-portal-frames',
        ], function () {

            Route::get('', 'FrontController@tenderCompanyIndex')->name('frontTenderIndexCompanyPortal');
            Route::get('create-company', 'FrontController@tenderRegisterCompany')->name('frontTenderRegisterCompanyPortal');
            Route::get('reset-tender-code', 'FrontController@tenderResetCode')->name('frontTenderResetCodePortal');

            Route::get('company-subscriptionPay/{code}', 'TenderController@subscriptionPay')->name('frontTendersubscriptionPayEnquiryPortal');
            Route::get('company-appends/{type}', 'FrontController@tenderCompanyEnquiry')->name('frontTenderCompanyEnquiryPortal');
            Route::get('tender-company-update-files/{code}', 'FrontController@tenderCompanyUpdateFiles')->name('frontTenderCompanyUpdateFilesPortal');
            Route::get('tender-company-status/{code}', 'FrontController@tenderCompanyStatus')->name('frontTenderCompanyStatusPortal');
            Route::get('company-appends/{type}', 'FrontController@tenderCompanyEnquiry')->name('frontTenderCompanyEnquiryPortal');
            Route::get('tender-company-update-files/{code}', 'FrontController@tenderCompanyUpdateFiles')->name('frontTenderCompanyUpdateFilesPortal');
            Route::get('all-tenders', 'FrontController@allTenders')->name('frontTenderAllTendersPortal');
            Route::get('all-available-tenders', 'FrontController@availableTenders')->name('frontTenderAvailableTendersPortal');
            Route::get('all-buyer-tenders', 'FrontController@rejectTenders')->name('frontTenderRejectTendersPortal');
            Route::get('all-approved-tenders', 'FrontController@approveTenders')->name('frontTenderApprovedTendersPortal');
            Route::get('tenders-show-tender/{id}', 'FrontController@showTenderDetails')->name('frontTenderShowTenderDetailsPortal');
            Route::get('tenders-show-tender-postpone/{id}', 'FrontController@showTenderDetailsPostpone')->name('frontTenderShowTenderDetailsPostponePortal');
            Route::get('view-tender-page/{id}', 'FrontController@showTenderPage')->name('frontTenderShowTenderPagePortal');

            Route::post('tender-file-company-payment', 'TenderController@handleTenderFilePayment')->name('handleTenderFilePaymentPortal');
            Route::post('tender-postpone-request', 'TenderController@handleTenderPostponeRequest')->name('handleTenderPostponeRequestPortal');

            Route::post('create-company', 'TenderController@handleTenderRegisterCompany')->name('handleTenderRegisterCompanyPortal');
            Route::post('reset-tender-code', 'TenderController@handleTenderResetCodeByMail')->name('handleTenderResetCodeByMailPortal');
            Route::post('company-appends/{type}', 'TenderController@handleTenderCompanyEnquiry')->name('handleTenderCompanyEnquiryPortal');
            Route::post('company-file-updates/{code}', 'TenderController@updateCompanyFiles')->name('frontUpdateCompanyFilesPortal');
        });

    });
});
