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

use Illuminate\Support\Facades\Artisan;

//Route::get('/login/azure', '\App\Http\Middleware\AppAzure@azure');
//Route::get('/login/azurecallback', '\App\Http\Middleware\AppAzure@azurecallback');
//Route::get('/logout/azure', '\App\Http\Middleware\AppAzure@azurelogout');


Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});
Auth::routes();
/**
 * languages middleware routes
 */

Route::group([
    'middleware' => ['LanguageMiddleware', 'ForceHttpProtocol'],
    'namespace' => 'Web',
    'prefix' => 'system'
], function () {
    /**
     * public routes
     */
    Route::group([
        'namespace' => 'Settings'
    ], function () {

        Route::get('ar', 'SettingsController@setAr')->name('setAr');
        Route::get('en', 'SettingsController@setEn')->name('setEn');
        Route::get('', 'AuthController@getLoginView');
        Route::get('login', 'AuthController@getLoginView')->name('getLoginView');
        Route::get('logout', 'AuthController@handleLogout')->name('handleLogout');

        Route::get('local/login', 'AuthController@getLocalLoginView')->name('getLocalLoginView');
        Route::post('login', 'AuthController@handleLogin')->name('handleLogin');

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
            'namespace' => 'Settings'
        ], function () {
            Route::get('', 'DashboardController@getDashboard');
            Route::get('home', 'DashboardController@getDashboard')->name('getDashboardView');
            Route::get('search', 'DashboardController@search')->name('getDashboardSearch');
            Route::get('getPayments', 'DashboardController@getPayments')->name('getPaymentsView')->middleware('can:payments');
            Route::get('getLogger', 'DashboardController@getLogger')->name('getLoggersView')->middleware('can:logger-settings');
            Route::get('getSiteSearch', 'DashboardController@getSiteSearch')->name('getSiteSearch');

            /**
             * config module routes
             */
            Route::group([
                'prefix' => 'config',
            ], function () {
                Route::get('update', 'SettingsController@getConfigView')->name('getConfigView');
                Route::post('update', 'SettingsController@handleConfig')->name('handleConfig');
            });


            /**
             * roles module routes
             */
            Route::group([
                'prefix' => 'roles',
                'middleware' => 'can:main-settings'
            ], function () {

                Route::get('all-roles', 'RoleController@index')->name('allRoles');
                Route::get('add-role', 'RoleController@create')->name('addRoles')->middleware('can:create-role');
                Route::post('add-role', 'RoleController@store')->name('handleAddRole')->middleware('can:create-role');
                Route::get('edit-role/{id}', 'RoleController@edit')->name('editRole')->middleware('can:edit-role');
                Route::get('get-role-users/{id}', 'RoleController@getRoleUsers')->name('getRoleUsers');
                Route::put('edit-role/{id}', 'RoleController@update')->name('handleEditRole')->middleware('can:edit-role');
                Route::delete('delete-role', 'RoleController@delete')->name('handleDeleteRole')->middleware('can:delete-role');

            });


            /**
             * user module routes
             */
            Route::group([
                'prefix' => 'users',
                'middleware' => 'can:main-settings'
            ], function () {

                Route::get('all-users', 'UserController@index')->name('allUsers');
                Route::get('add-user', 'UserController@create')->name('addUsers')->middleware('can:create-user');
                Route::post('add-user', 'UserController@store')->name('handleAddUser')->middleware('can:create-user');
                Route::get('edit-user/{id}', 'UserController@edit')->name('editUser');
                Route::put('edit-user/{id}', 'UserController@update')->name('handleEditUser');
                Route::delete('delete-user', 'UserController@delete')->name('handleDeleteUser');

            });

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

        /**
         * violation module routes
         */
        Route::group([
            'prefix' => 'violation',
            'namespace' => 'Violation'
        ], function () {

            Route::get('all-civilians', 'CivilController@getAllCivilians')->name('allCivilians');

            Route::get('all-officers', 'OfficerController@index')->name('allOfficers')->middleware('can:all-officer');
            Route::get('add-officer', 'OfficerController@create')->name('addOfficers')->middleware('can:create-officer');
            Route::post('add-officer', 'OfficerController@store')->name('handleAddOfficer')->middleware('can:create-officer');
            Route::get('edit-officer/{id}', 'OfficerController@edit')->name('editOfficer')->middleware('can:update-officer');
            Route::put('edit-officer/{id}', 'OfficerController@update')->name('handleEditOfficer')->middleware('can:update-officer');
            Route::delete('delete-officer', 'OfficerController@delete')->name('handleDeleteOfficer')->middleware('can:delete-officer');


            Route::get('all-subject-rules', 'SubjectController@index')->name('allSubjectRules')->middleware('can:all-subject');
            Route::get('create-subject-rule', 'SubjectController@create')->name('createSubjectRules')->middleware('can:create-subject');
            Route::post('create-subject-rule', 'SubjectController@store')->name('handleCreateSubjectRules')->middleware('can:create-subject');
            Route::get('edit-subject-rule/{id}', 'SubjectController@edit')->name('editSubjectRules')->middleware('can:update-subject');
            Route::put('edit-subject-rule/{id}', 'SubjectController@update')->name('handleEditSubjectRules')->middleware('can:update-subject');
            Route::delete('delete-subject-rule', 'SubjectController@delete')->name('handleDeleteSubjectRules')->middleware('can:delete-subject');
            Route::delete('delete-subject-rule-paragraph', 'SubjectController@deleteParagraph')->name('handleDeleteSubjectRuleParagraphs')->middleware('can:delete-subject-paragraph');


            Route::get('all-punishment-rules', 'PunishmentController@index')->name('allPunishmentRules')->middleware('can:all-punishment');
            Route::get('create-punishment-rule', 'PunishmentController@create')->name('createPunishmentRules')->middleware('can:create-punishment');
            Route::post('create-punishment-rule', 'PunishmentController@store')->name('handleCreatePunishmentRules')->middleware('can:create-punishment');
            Route::get('edit-punishment-rule/{id}', 'PunishmentController@edit')->name('editPunishmentRules')->middleware('can:update-punishment');
            Route::put('edit-punishment-rule/{id}', 'PunishmentController@update')->name('handleEditPunishmentRules')->middleware('can:update-punishment');
            Route::delete('delete-punishment-rule', 'PunishmentController@delete')->name('handleDeletePunishmentRules')->middleware('can:delete-punishment');
            Route::delete('delete-punishment-rule-paragraph', 'PunishmentController@deleteParagraph')->name('handleDeletePunishmentRuleParagraphs')->middleware('can:delete-punishment-paragraph');


            Route::get('attach-subject-punishment-rules', 'SubjectPunsihmentController@getAttachView')->name('attachSubjectPunishmentRules')->middleware('can:relate-subject-punishment');
            Route::post('attach-subject-punishment-rules', 'SubjectPunsihmentController@handleAttachPunishment')->name('handleAttachSubjectPunishmentRules')->middleware('can:relate-subject-punishment');
            Route::delete('delete-subject-punishment-rules', 'SubjectPunsihmentController@handleDeletePunishment')->name('handleDeleteSubjectPivote')->middleware('can:relate-subject-punishment');


            Route::get('all-external-PPFrom', 'PPFormController@allExternalPPFromView')->name('allExternalPPFromView');
            Route::get('create-external-PPFrom', 'PPFormController@createExternalPPFromView')->name('createExternalPPFromView');
            Route::post('create-external-PPFrom', 'PPFormController@handleCreateExtrenalPPFrom')->name('handleCreateExtrenalPPFrom');
            Route::get('edit-external-PPFrom/{id}', 'PPFormController@editExternalPPForm')->name('editExternalPPForm');
            Route::post('edit-external-PPFrom/{id}', 'PPFormController@handleEditExtrenalPPFrom')->name('handleEditExtrenalPPFrom');
            Route::delete('delete-external-PPFrom', 'PPFormController@handleDeleteExtrenalPPFrom')->name('handleDeleteExtrenalPPFrom');

            Route::get('edit-PPFrom', 'PPFormController@editPPFromView')->name('editPPFrom')->middleware('can:ppform-violation');
            Route::get('edit-PPFromManual', 'PPFormController@editPPFromManualView')->name('editPPFromManualView')->middleware('can:ppform-violation');
            Route::get('add-violation-PPFrom/{id}', 'PPFormController@addViolationPPFromView')->name('addViolationPPFromView')->middleware('can:ppform-civilian-violation');
            Route::post('edit-PPFrom', 'PPFormController@handleEditPPFrom')->name('submitEditPPFrom')->middleware('can:update-ppform-violation');
            Route::post('add-PPFrom/{id}', 'PPFormController@handleAddNewPPFrom')->name('handleAddNewPPFrom')->middleware('can:ppform-civilian-violation');


            Route::get('all-violations', 'ViolationController@index')->name('allViolations')->middleware('can:all-violation');
            Route::get('create-violation', 'ViolationController@create')->name('addViolation')->middleware('can:create-violation');
            Route::post('create-violation', 'ViolationController@store')->name('handleAddViolation')->middleware('can:create-violation');
            Route::get('edit-violation/{id}', 'ViolationController@edit')->name('editViolation')->middleware('can:update-violation');
            Route::put('edit-violation/{id}', 'ViolationController@update')->name('handleEditViolation')->middleware('can:update-violation');
            Route::post('edit-violation-action', 'ViolationController@updateAction')->name('handleEditViolationAction')->middleware('can:violation-action');
            Route::delete('delete-violation', 'ViolationController@delete')->name('handleDeleteViolation')->middleware('can:delete-violation');
            Route::get('generate-violation-report', 'ViolationController@generateViolationReport')->name('generateViolationReport')->middleware('can:report-violation');
            Route::get('generate-violation-params-report', 'ViolationController@generateViolationReportParams')->name('generateViolationReportParams')->middleware('can:report-violation');
            Route::get('generate-payment/{id}', 'ViolationController@getViolationPayment')->name('getViolationPayment');
            Route::get('generate-payment-report', 'ViolationController@generateViolationReceipt')->name('generateViolationReceipt');
            Route::post('generate-payment', 'ViolationController@handleViolationPayment')->name('handleViolationPayment');
            Route::get('show-violation/{id}', 'ViolationController@showViolationData')->name('showViolationData');

        });


        /**
         * Tender Routes
         */
        Route::group([
            'prefix' => 'tender',
            'namespace' => 'Tender'
        ], function () {

            Route::get('all-tenders', 'TenderController@index')->name('allTenders')->middleware('can:all-tender');
            Route::get('create-tender', 'TenderController@create')->name('addTender')->middleware('can:create-tender');
            Route::post('create-tender', 'TenderController@store')->name('postTender')->middleware('can:create-tender');
            Route::get('edit-tender/{id}', 'TenderController@edit')->name('editTender')->middleware('can:edit-tender');
            Route::put('edit-tender/{id}', 'TenderController@update')->name('updateTender')->middleware('can:edit-tender');
            Route::delete('delete', 'TenderController@delete')->name('handleDeleteTender')->middleware('can:delete-tender');

            Route::get('tender-postpone/{id}', 'TenderController@getTenderPostponeView')->name('getTenderPostponeView')->middleware('can:postpone-tender');
            Route::post('tender-postpone/{id}', 'TenderController@handlePostponeView')->name('handlePostponeView')->middleware('can:postpone-tender');

            Route::get('tender-buyers/{id}', 'TenderController@getTenderBuyersView')->name('getTenderBuyersView')->middleware('can:all-buyer-tender');
            Route::post('tender-buyers/{id}', 'TenderController@handleTenderBuyersStore')->name('handleTenderBuyersStore')->middleware('can:create-buyer-tender');
            Route::post('tender-buyers-update', 'TenderController@handleTenderBuyersUpdate')->name('handleTenderBuyersUpdate')->middleware('can:edit-buyer-tender');
            Route::delete('tender-buyers-delete', 'TenderController@handleTenderBuyersDelete')->name('handleTenderBuyersDelete')->middleware('can:delete-buyer-tender');

            Route::get('tender-files/{id}', 'TenderController@getTenderFilesView')->name('getTenderFilesView')->middleware('can:all-files-tender');
            Route::post('tender-details-files/{id}', 'TenderController@createFileDetails')->name('createTenderFileDetails')->middleware('can:create-files-tender');
            Route::delete('tender-details-files/{id}', 'TenderController@deleteFileDetails')->name('deleteTenderFileDetails')->middleware('can:delete-files-tender');

            Route::get('tender-applications/{id}', 'TenderController@getTenderApplicationsView')->name('getTenderApplicationsView')->middleware('can:all-application-tender');
            Route::post('tender-applications/{id}', 'TenderController@handleTenderApplicationsStore')->name('handleTenderApplicationsStore')->middleware('can:create-application-tender');
            Route::put('tender-application-update/{id}', 'TenderController@handleTenderApplicationsUpdate')->name('handleTenderApplicationsUpdate')->middleware('can:edit-application-tender');
            Route::delete('handleTenderApplicationsDelete', 'TenderController@handleTenderApplicationsDelete')->name('handleTenderApplicationsDelete')->middleware('can:delete-application-tender');

            Route::get('select-winners/{id}', 'TenderController@getSelectWinnersView')->name('getSelectWinnersView')->middleware('can:select-tender-winner');
            Route::post('select-winners/{id}', 'TenderController@handleUpdateWinnerApplication')->name('handleUpdateWinnerApplication')->middleware('can:select-tender-winner');

            Route::get('generateTenderReport', 'TenderController@generateTenderReport')->name('generateTenderReport')->middleware('can:tender-reports');
            Route::get('generateTenderSubscriptionPaymentReport', 'TenderController@generateTenderSubscriptionPaymentReport')->name('generateTenderSubscriptionPaymentReport')->middleware('can:tender-reports');
            Route::get('generateTenderBuyersPaymentReport', 'TenderController@generateTenderBuyersPaymentReport')->name('generateTenderBuyersPaymentReport')->middleware('can:tender-reports');
        });


        /**
         * Tender Companies Routes
         */
        Route::group([
            'prefix' => 'companies',
            'namespace' => 'Tender'
        ], function () {

            Route::get('all-tender-companies', 'CompanyController@index')->name('allCompanies')->middleware('can:all-tender-company');
            Route::get('create-tender-company', 'CompanyController@create')->name('addCompany')->middleware('can:create-tender-company');
            Route::post('create-tender-company', 'CompanyController@store')->name('handleCompany')->middleware('can:create-tender-company');
            Route::get('edit-tender-company/{id}', 'CompanyController@edit')->name('editCompany')->middleware('can:edit-tender-company');
            Route::post('edit-tender-company/{id}', 'CompanyController@update')->name('handleEditCompany')->middleware('can:edit-tender-company');
            Route::delete('delete-tender-company', 'CompanyController@delete')->name('deleteCompany')->middleware('can:delete-tender-company');
            Route::get('edit-company-files/{id}', 'CompanyController@getCompnayFiles')->name('editCompanyFiles')->middleware('can:files-tender-company');
            Route::get('get-company-transactions/{id}', 'CompanyController@getCompanyTransactions')->name('getCompanyTransactions')->middleware('can:transactions-tender-company');
            Route::post('edit-company-files/{id}', 'CompanyController@handleCompnayFiles')->name('handleCompnayFiles')->middleware('can:files-tender-company');
            Route::post('decideCompnayFiles', 'CompanyController@decideCompnayFiles')->name('decideCompnayFiles')->middleware('can:decide-files-tender-company');
            Route::post('markCompanyAsRead', 'CompanyController@markAsRead')->name('markCompanyAsRead')->middleware('can:read-tender-company');
            Route::post('activateDeactivate', 'CompanyController@activateDeactivate')->name('activateDeactivateCompany')->middleware('can:active-tender-company');
            Route::post('payCompanySubscription', 'CompanyController@payCompanySubscription')->name('payCompanySubscription')->middleware('can:pay-tender-company');

        });

        /**
         * Tender Pages Routes
         */
        Route::group([
            'prefix' => 'pages',
            'namespace' => 'Tender'
        ], function () {

            Route::get('all-pages', 'PagesController@index')->name('allPages')->middleware('can:all-page');
            Route::get('create-page', 'PagesController@create')->name('addPage')->middleware('can:create-page');
            Route::post('create-pages', 'PagesController@store')->name('storePages')->middleware('can:create-page');
            Route::get('edit-page/{id}', 'PagesController@edit')->name('editPage')->middleware('can:edit-page');
            Route::put('update-pages/{id}', 'PagesController@update')->name('updatePages')->middleware('can:edit-page');
            Route::delete('delete-page', 'PagesController@delete')->name('deletePages')->middleware('can:delete-page');

        });


        /**
         * Tender Certificate Routes
         */
        Route::group([
            'prefix' => 'certificate',
            'namespace' => 'Certificate'
        ], function () {

            Route::get('all-certificate', 'CertificateController@index')->name('allCertificate')->middleware('can:all-certificate');
            Route::get('edit-certificate/{id}', 'CertificateController@edit')->name('editCertificate')->middleware('can:edit-certificate');
            Route::get('get-certificate/{id}', 'CertificateController@getCertification')->name('getCertificate')->middleware('can:print-certificate');
            Route::get('get-payment/{id}', 'CertificateController@getPayment')->name('getPaymentCertificate')->middleware('can:pay-certificate');
            Route::put('edit-certificate/{id}', 'CertificateController@update')->name('updateCertificate')->middleware('can:edit-certificate');
            Route::post('approve-certificate', 'CertificateController@approve')->name('approveCertificate')->middleware('can:decide-certificate');
            Route::post('delete-certificate', 'CertificateController@delete')->name('deleteCertificate')->middleware('can:delete-certificate');

        });

        /**
         * Environmental Requests Routes
         */
        Route::group([
            'prefix' => 'environmental',
            'namespace' => 'Environmental'
        ], function () {

            Route::get('all-environmental-requests', 'EnvironmentalController@index')->name('allEnvironmentalRequests')->middleware('can:all-environmental');
            Route::put('edit-environmental-requests/{id}', 'EnvironmentalController@update')->name('updateEnvironmentalRequests')->middleware('can:edit-environmental');
            Route::post('deleteEnvironmentalRequests', 'EnvironmentalController@delete')->name('deleteEnvironmentalRequests')->middleware('can:delete-environmental');

        });
        /**
         *  Visits Routes
         */
        Route::group([
            'prefix' => 'visits',
            'namespace' => 'Visit'
        ], function () {

            Route::get('all-visits', 'VisitReserveController@index')->name('allVisits')->middleware('can:all-visits');
            Route::post('approve', 'VisitReserveController@approve')->name('approveVisitAdmin')->middleware('can:approve-visit');
            Route::post('delete-visit', 'VisitReserveController@delete')->name('deleteVisitAdmin')->middleware('can:delete-visit');

        });

        /**
         * Office Agent Routes
         */
        Route::group([
            'prefix' => 'officeAgent',
            'namespace' => 'OfficeAgent'
        ], function () {

            Route::get('getLoggerReportView', 'OfficeAgentController@getLoggerReportView')->name('getLoggerReportView')->middleware('can:office-reports');
            Route::get('getEditCompanyReportView', 'OfficeAgentController@getEditCompanyReportView')->name('getEditCompanyReportView')->middleware('can:office-reports');
            Route::get('getProcessView/{office_agent_id}', 'OfficeAgentController@getProcessView')->name('getProcessView');

            Route::get('getIsoCertView', 'OfficeAgentController@getIsoCertView')->name('getIsoCertView');
            Route::post('handleIsoCertRequest', 'OfficeAgentController@handleIsoCertRequest')->name('handleIsoCertRequest');
            Route::post('deleteIso', 'OfficeAgentController@deleteIso')->name('deleteIso');

            Route::get('getOfficeAgentsReportView', 'OfficeAgentController@getOfficeAgentsReportView')->name('getOfficeAgentsReportView')->middleware('can:office-reports');
            Route::get('getOfficeAgentDevicesReportView', 'OfficeAgentController@getOfficeAgentDevicesReportView')->name('getOfficeAgentDevicesReportView')->middleware('can:office-reports');
            Route::get('getOfficeEmployeeReportView', 'OfficeAgentController@getOfficeEmployeeReportView')->name('getOfficeEmployeeReportView')->middleware('can:office-reports');
            Route::get('getOfficePaymentsReportView', 'OfficeAgentController@getOfficePaymentsReportView')->name('getOfficePaymentsReportView')->middleware('can:office-reports');
            Route::get('getOfficeApprovedReportView', 'OfficeAgentController@getOfficeApprovedReportView')->name('getOfficeApprovedReportView')->middleware('can:office-reports');


            Route::get('getAllActivitiesView', 'OfficeAgentController@getAllActivitiesView')->name('getAllActivitiesView')->middleware('can:agent-activity');
            Route::get('getAllActivitiesDecisionsView/{id}', 'OfficeAgentController@getAllActivitiesDecisionsView')->name('getAllActivitiesDecisionsView');
            Route::post('handleAllActivitiesDecisionsRequest/{id}', 'OfficeAgentController@handleAllActivitiesDecisionsRequest')->name('handleAllActivitiesDecisionsRequest');
            Route::post('handleDeleteActivitiesDecisionsRequest', 'OfficeAgentController@handleDeleteActivitiesDecisionsRequest')->name('handleDeleteActivitiesDecisionsRequest');
            Route::get('editAllActivitiesView/{id}', 'OfficeAgentController@editAllActivitiesView')->name('editAllActivitiesView');
            Route::post('handleEditAllActivitiesView/{id}', 'OfficeAgentController@handleEditAllActivitiesView')->name('handleEditAllActivitiesView');

            Route::get('getManagerUserView', 'OfficeAgentController@getManagerUserView')->name('getManagerUserView')->middleware('can:auth-user');
            Route::post('handleManagerUserRequest', 'OfficeAgentController@handleManagerUserRequest')->name('handleManagerUserRequest');

            Route::get('getAllLocations', 'OfficeAgentController@getAllLocations')->name('getAllLocations')->middleware('can:city');
            Route::get('createAllLocations', 'OfficeAgentController@createAllLocations')->name('createAllLocations')->middleware('can:city');
            Route::post('createAllLocations', 'OfficeAgentController@handleCreateAllLocations')->name('handleCreateAllLocations')->middleware('can:city');
            Route::get('editAllLocations/{id}', 'OfficeAgentController@editAllLocations')->name('editAllLocations')->middleware('can:city');
            Route::post('editAllLocations/{id}', 'OfficeAgentController@handleUpdataAllLocations')->name('handleUpdataAllLocations')->middleware('can:city');
            Route::delete('handleDeleteLocations', 'OfficeAgentController@handleDeleteLocations')->name('handleDeleteLocations')->middleware('can:city');

            Route::get('inbox-orders', 'OfficeAgentController@getInboxOrdersView')->name('getInboxOrdersView')->middleware('can:office-agent-inbox');
            Route::get('search-orders', 'OfficeAgentController@getSearchOrdersView')->name('getSearchOrdersView')->middleware('can:search-office');
            Route::get('archived-orders', 'OfficeAgentController@getArchivedOrdersView')->name('getArchivedOrdersView');
            Route::get('lazy-orders', 'OfficeAgentController@getLateOrdersView')->name('getLateOrdersView')->middleware('can:late-office');
            Route::get('uncompleted-orders', 'OfficeAgentController@getUncompletedOrdersView')->name('getUncompletedOrdersView')->middleware('can:uncompleted-office');
            Route::get('getRequestOrders/{id}', 'OfficeAgentController@getRequestOrdersView')->name('getRequestOrdersView')->middleware('can:update-office');
            Route::get('getArchivedRequestOrders/{id}', 'OfficeAgentController@getRequestOrdersView')->name('getArchivedRequestOrders');
            Route::get('getRequestHistoryOrdersView/{id}', 'OfficeAgentController@getRequestHistoryOrdersView')->name('getRequestHistoryOrdersView');
            Route::post('adminOfficeConfirmUpdateOrder/{id}', 'OfficeAgentController@adminOfficeConfirmUpdateOrder')->name('adminOfficeConfirmUpdateOrder');

            Route::get('updateOfficeOrderType/{id}', 'OfficeAgentController@updateOfficeOrderType')->name('updateOfficeOrderType');

            Route::get('getRequestChangeNameOrdersView/{id}', 'OfficeAgentController@getRequestChangeNameOrdersView')->name('getRequestChangeNameOrdersView')->middleware('can:office-request');
            Route::post('handleRequestChangeNameOrdersView/{id}', 'OfficeAgentController@handleRequestChangeNameOrdersView')->name('handleRequestChangeNameOrdersView');

            Route::get('getRequestReturnOrdersView/{id}', 'OfficeAgentController@getRequestReturnOrdersView')->name('getRequestReturnOrdersView')->middleware('can:office-request');
            Route::post('handleRequestReturnOrdersView/{id}', 'OfficeAgentController@handleRequestReturnOrdersView')->name('handleRequestReturnOrdersView');

            Route::get('getErrorFilesView/{id}', 'OfficeAgentController@getErrorFilesView')->name('getErrorFilesView')->middleware('can:show-required-data');
            Route::get('getRequestCopyOrdersView/{id}', 'OfficeAgentController@getRequestCopyOrdersView')->name('getRequestCopyOrdersView')->middleware('can:office-request');
            Route::post('handleRequestCopyOrdersView/{id}', 'OfficeAgentController@handleRequestCopyOrdersView')->name('handleRequestCopyOrdersView');

            Route::get('getRequestRenewCertifyView/{id}', 'OfficeAgentController@getRequestRenewCertifyView')->name('getRequestRenewCertifyView')->middleware('can:office-request');
            Route::post('handleRequestRenewCertifyView/{id}', 'OfficeAgentController@handleRequestRenewCertifyView')->name('handleRequestRenewCertifyView');

            Route::get('getRequestApproveCertifyView/{id}', 'OfficeAgentController@getRequestApproveCertifyView')->name('getRequestApproveCertifyView')->middleware('can:office-request');
            Route::post('handleRequestApproveCertifyView/{id}', 'OfficeAgentController@handleRequestApproveCertifyView')->name('handleRequestApproveCertifyView');

            Route::get('getFormCertify/{id}/{form_type}', 'OfficeAgentController@getFormCertify')->name('getFormCertify');


            Route::post('adminOfficeAgentUpdateInfo/{id}', 'OfficeAgentController@adminOfficeAgentUpdateInfo')->name('adminOfficeAgentUpdateInfo');
            Route::post('adminOfficeAgentUpdateCompanyAttachment/{id}', 'OfficeAgentController@adminOfficeAgentUpdateCompanyAttachment')->name('adminOfficeAgentUpdateCompanyAttachment');

            Route::post('adminHandleCompanyAddPartenerRequest/{id}', 'OfficeAgentController@adminHandleCompanyAddPartenerRequest')->name('adminHandleCompanyAddPartenerRequest');
            Route::post('adminHandleCompanyAddBranchRequest/{id}', 'OfficeAgentController@adminHandleCompanyAddBranchRequest')->name('adminHandleCompanyAddBranchRequest');

            Route::post('adminAddHumanResourceEmployee/{id}', 'OfficeAgentController@adminAddHumanResourceEmployee')->name('adminAddHumanResourceEmployee');
            Route::post('adminUpdateHumanResourceEmployee/{id}', 'OfficeAgentController@adminUpdateHumanResourceEmployee')->name('adminUpdateHumanResourceEmployee');
            Route::post('adminOfficeAgentAddEmployeeAttachment/{id}', 'OfficeAgentController@adminOfficeAgentAddEmployeeAttachment')->name('adminOfficeAgentAddEmployeeAttachment');

            Route::post('adminOfficeAgentAddInstallment/{id}', 'OfficeAgentController@adminOfficeAgentAddInstallment')->name('adminOfficeAgentAddInstallment');
            Route::post('adminOfficeAgentAddInstallmentAttachment/{id}', 'OfficeAgentController@adminOfficeAgentAddInstallmentAttachment')->name('adminOfficeAgentAddInstallmentAttachment');
            Route::post('adminOfficeAgentUpdateDevice/{id}', 'OfficeAgentController@adminOfficeAgentUpdateDevice')->name('adminOfficeAgentUpdateDevice');

            Route::post('adminOfficeAgentDeleteAttachment/{id}', 'OfficeAgentController@adminOfficeAgentDeleteAttachment')->name('adminOfficeAgentDeleteAttachment');
            Route::post('adminDeleteInstallmentAttachmentRequest/{id}', 'OfficeAgentController@adminDeleteInstallmentAttachmentRequest')->name('adminDeleteInstallmentAttachmentRequest');
            Route::post('adminOfficeAgentDeleteCompanyPartner/{id}', 'OfficeAgentController@adminOfficeAgentDeleteCompanyPartner')->name('adminOfficeAgentDeleteCompanyPartner');
            Route::post('adminDeleteHumanResourceEmployeeRequest/{id}', 'OfficeAgentController@adminDeleteHumanResourceEmployeeRequest')->name('adminDeleteHumanResourceEmployeeRequest');
            Route::post('adminOfficeAgentDeleteBranchAddress/{id}', 'OfficeAgentController@adminOfficeAgentDeleteBranchAddress')->name('adminOfficeAgentDeleteBranchAddress');
            Route::post('adminDeleteInstallmentRequest/{id}', 'OfficeAgentController@adminDeleteInstallmentRequest')->name('adminDeleteInstallmentRequest');
            Route::post('adminDeleteHumanResourceFileRequest/{id}', 'OfficeAgentController@adminDeleteHumanResourceFileRequest')->name('adminDeleteHumanResourceFileRequest');
            Route::post('adminHandleOutterAttachment/{id}', 'OfficeAgentController@adminHandleOutterAttachment')->name('adminHandleOutterAttachment');
            Route::post('adminOfficeAgentDeleteExternalAttachment/{id}', 'OfficeAgentController@adminOfficeAgentDeleteExternalAttachment')->name('adminOfficeAgentDeleteExternalAttachment');

            Route::post('adminOfficeAgentAddStudy/{id}', 'OfficeAgentController@adminOfficeAgentAddStudy')->name('adminOfficeAgentAddStudy');
            Route::post('adminDeleteofficeAgentStudyRequest/{id}', 'OfficeAgentController@adminDeleteofficeAgentStudyRequest')->name('adminDeleteofficeAgentStudyRequest');

            Route::get('get-offices', 'OfficeAgentController@getOfficesView')->name('getOfficesView')->middleware('can:office-users');

            Route::get('getOfficeAgentLoggerView/{id}', 'OfficeAgentController@getOfficeAgentLoggerView')->name('getOfficeAgentLoggerView');
            Route::get('getStopCertifyView/{id}', 'OfficeAgentController@getStopCertifyView')->name('getStopCertifyView');
            Route::post('getStopCertifyView/{id}', 'OfficeAgentController@handleRequestRejectCertifyView')->name('handleRequestRejectCertifyView');
            Route::post('deleteStopCertify', 'OfficeAgentController@deleteStopCertify')->name('deleteStopCertify');

            Route::get('getFormOfficeView/{id}', 'OfficeAgentController@getFormOfficeView')->name('getFormOfficeView')->middleware('can:office-certificate');
            Route::post('handleFormOfficeHtml', 'OfficeAgentController@handleFormOfficeHtml')->name('handleFormOfficeHtml')->middleware('can:office-form');

            Route::get('attach-users', 'OfficeAgentController@getAttachUsersView')->name('getAttachUsersView')->middleware('can:user-department-update');
            Route::post('attach-users', 'OfficeAgentController@handleAttachUsers')->name('handleAttachUsers');
            Route::delete('delete-attached-users', 'OfficeAgentController@handleDeletAttachedUsers')->name('handleDeletAttachedUsers');


            Route::get('updateOfficeFrontStatus/{id}', 'OfficeAgentController@updateStatusFront')->name('updateStatusFront');
            Route::get('updateOfficeRead/{id}', 'OfficeAgentController@updateOfficeRead')->name('updateOfficeRead');

            Route::get('getOfficeAsbestosView', 'OfficeAgentController@getOfficeAsbestosView')->name('getOfficeAsbestosView')->middleware('can:show-asbestos');
            Route::get('showOfficeAsbestosOrder/{id}', 'OfficeAgentController@showOfficeAsbestosOrder')->name('showOfficeAsbestosOrder')->middleware('can:show-asbestos');
            Route::delete('deleteOfficeAsbestosOrder', 'OfficeAgentController@deleteOfficeAsbestosOrder')->name('deleteOfficeAsbestosOrder');

        });

    });

    Route::get('edit-environmental-requests/{token}', 'Environmental\EnvironmentalController@edit')->name('editEnvironmentalRequests');//->middleware('can:edit-environmental');
//    Route::get('visits/show-visit/{token}', 'Visit\VisitReserveController@show')->name('showVisitAdmin');
    //->middleware('can:show-visit');


    Route::group([
        'middleware' => 'userAuth'
    ], function () {

        Route::group([
            'prefix' => 'violation'
        ], function () {


        });
    });

});
Route::group([
    'middleware' => ['LanguageMiddleware', 'ForceHttpProtocol'],
    'namespace' => 'Web',
//    'prefix' => 'system'
], function () {
    Route::get('visits/show-visit/{token}', 'Visit\VisitReserveController@show')->name('showVisitAdmin');
});

