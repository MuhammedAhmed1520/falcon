<?php

namespace App\Http\Controllers\Web\OfficeAgent;

use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\GovernorateController;
use App\Http\Controllers\Api\OfficeAgent\HumanResourceController;
use App\Http\Controllers\Api\OfficeAgent\OfficeActivityController;
use App\Http\Controllers\Api\OfficeAgent\OfficeDecisionController;
use App\Http\Controllers\Api\OfficeAgent\OfficeDepartmentController;
use App\Http\Controllers\Api\OfficeAgent\OfficeDeviceController;
use App\Http\Controllers\Api\OfficeAgent\OfficeExternalAttachmentController;
use App\Http\Controllers\Api\OfficeAgent\OfficeInActiveController;
use App\Http\Controllers\Api\OfficeAgent\OfficeIsoController;
use App\Http\Controllers\Api\OfficeAgent\OfficeOrderAsbestosController;
use App\Http\Controllers\Api\OfficeAgent\OfficePartnerController;
use App\Http\Controllers\Api\OfficeAgent\OfficeProcessController;
use App\Http\Controllers\Api\OfficeAgent\OfficeStudyController;
use App\Http\Controllers\Api\UserController as USERCtrl;
use App\Http\Controllers\Api\UtilityController;
use App\Models\OfficeOrderAsbestos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficeAgentController extends Controller
{

    private $utilityController;
    private $office_agent;
    private $office_agent_partner;
    private $office_agent_human_resource;
    private $office_agent_devices;
    private $office_agent_study;
    private $office_agent_department;
    private $office_agent_process;
    private $office_agent_activiy;
    private $office_agent_inactive;
    private $user;
    private $form;
    private $locations;
    private $office_iso_ctrl;
    private $office_decision_ctrl;
    private $office_external_attachment;
    private $office_asbestos_ctrl;

    public function __construct()
    {
        $this->utilityController = new UtilityController();
        $this->user = new USERCtrl();
        $this->office_agent = new \App\Http\Controllers\Api\OfficeAgent\OfficeAgentController();
        $this->office_agent_partner = new OfficePartnerController();
        $this->office_agent_human_resource = new HumanResourceController();
        $this->office_agent_devices = new OfficeDeviceController();
        $this->office_agent_study = new OfficeStudyController();
        $this->office_agent_department = new OfficeDepartmentController();
        $this->office_agent_process = new OfficeProcessController();
        $this->office_agent_activiy = new OfficeActivityController();
        $this->office_agent_inactive = new OfficeInActiveController();
        $this->form = new FormController();
        $this->locations = new GovernorateController();
        $this->office_iso_ctrl = new OfficeIsoController();
        $this->office_decision_ctrl = new OfficeDecisionController();
        $this->office_external_attachment = new OfficeExternalAttachmentController();
        $this->office_asbestos_ctrl = new OfficeOrderAsbestosController();
    }

    public function getSearchOrdersView(Request $request)
    {

        $page_title = 'Search Orders';
        $request->request->add(['user_id' => auth()->user()->id]);
        $officeAgents = $this->office_agent->getAllOfficeAgents($request)['data']['officeAgents'];
        $office_order_types = $this->utilityController->getOfficeAgentOptions('office_order_type')['data']['options'] ?? [];
        $office_agent_activies = $this->office_agent_activiy->all()['data']['activities'] ?? [];
        $final_decisions = $this->utilityController->officeFinalOpinion()['data']['options'] ?? [];
        $departments = $this->office_agent_department->allDepartmentPeople()['data']['departments'] ?? [];
//        return $officeAgents;
        return view('pages.officeAgent.orders.all.index', compact('page_title', 'officeAgents', 'office_agent_activies', 'office_order_types', 'final_decisions', 'departments'));
    }

    public function getInboxOrdersView(Request $request)
    {

        $page_title = 'Inbox Orders';
        $request->request->add(['user_id' => auth()->user()->id]);
        $officeAgents = $this->office_agent->getAllOfficeAgentsInbox($request)['data']['officeAgents'];
        // return $officeAgents;
        return view('pages.officeAgent.orders.inbox_orders.index', compact('page_title', 'officeAgents'));
    }

    public function getLateOrdersView(Request $request)
    {

        $page_title = 'Late Orders';
        $request->request->add(['user_id' => auth()->user()->id]);
        $officeAgents = $this->office_agent->getLateAgents($request)['data']['officeAgents'];
//        return $officeAgents;
        return view('pages.officeAgent.orders.late_orders.index', compact('page_title', 'officeAgents'));
    }

    public function getArchivedOrdersView(Request $request)
    {

        $page_title = 'Archived Orders';
        $request->request->add(['user_id' => auth()->user()->id]);
        $officeAgents = $this->office_agent->getArchivedOfficeAgents($request)['data']['officeAgents'];
//        return $officeAgents;
        return view('pages.officeAgent.orders.archived_orders.index', compact('page_title', 'officeAgents'));
    }

    public function getUncompletedOrdersView(Request $request)
    {

        $page_title = 'UnCompleted Orders';
        $request->request->add(['user_id' => auth()->user()->id]);
        $departments = $this->office_agent_department->allDepartmentPeople()['data']['departments'] ?? [];
        $final_decisions = $this->utilityController->officeFinalOpinion()['data']['options'] ?? [];
        $officeAgents = $this->office_agent->getUnCompleteAgents($request)['data']['officeAgents'];
        return view('pages.officeAgent.orders.uncompleted_orders.index', compact('page_title', 'officeAgents', 'final_decisions', 'departments'));
    }

    public function prepareOfficeAgentData($office_agent)
    {

        return $office_agent;
    }

    public function getRequestOrdersView(Request $request, $id)
    {
        $page_title = 'get Request Orders';
        $user_id = auth()->user()->id ?? 0;
        $request->request->add(['user_id' => $user_id]);
        $request->request->add(['is_read' => 1]);
        $office_agent = $this->office_agent->findOfficeByIdAdmin($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }

        $histories = $this->office_agent->getAllHistory($id)['data']['histories'] ?? [];
        // return $histories;

        // return $office_agent;
        $_office_agent = $this->prepareOfficeAgentData($office_agent);
        $request->request->add(['options' => $_office_agent]);
        $office_section_type = $this->utilityController->getOfficeAgentOptions('office_section_type')['data']['options'] ?? [];
        $office_section_activity = $this->utilityController->getOfficeAgentOptions('office_section_activity')['data']['options'] ?? [];
        $company_type = $this->utilityController->getOfficeAgentOptions('company_type')['data']['options'] ?? [];
        $governorates = $this->utilityController->getGovernment()['data']['governorates'] ?? [];

        $gov_id = $office_agent->main_address->governorate_id ?? $governorates[0]['id'] ?? null;
        $cities = $this->utilityController->getCity($gov_id)['data']['cities'] ?? [];

        $branch_types = $this->utilityController->getOfficeAgentOptions('branch_type')['data']['options'] ?? [];
        $another_branch_types = $this->utilityController->getOfficeAgentOptions('another_branch_type')['data']['options'] ?? [];
        $contract_types = $this->utilityController->getOfficeAgentOptions('contract_type')['data']['options'] ?? [];
        $classification_degrees = $this->utilityController->getOfficeAgentOptions('classification_degree')['data']['options'] ?? [];
//        $specializes = $this->utilityController->getOfficeAgentOptions('specialize')['data']['options'] ?? [];
        $specializes = $this->utilityController->getOfficeAgentOptions('specialize_' . $office_agent->office_type_id)['data']['options'] ?? [];
        $office_file_types = $this->utilityController->getOfficeAgentOptions('office_file_type')['data']['options'] ?? [];
        $human_resource_jobs = $this->utilityController->getOfficeAgentOptions('human_resource_job')['data']['options'] ?? [];
        $human_resource_specializations = $this->utilityController->getOfficeAgentOptions('human_resource_specialization')['data']['options'] ?? [];
        $human_resource_degrees = $this->utilityController->getOfficeAgentOptions('human_resource_degree')['data']['options'] ?? [];
        $partner_attachment_types = $this->utilityController->getOfficeAgentOptions('partner_attachment_type')['data']['options'] ?? [];
        $human_resource_file_types = $this->utilityController->getOfficeAgentOptions('human_resource_file_type')['data']['options'] ?? [];
        $device_file_types = $this->utilityController->getOfficeAgentOptions('device_file_type')['data']['options'] ?? [];
        $iso_dbs = $this->utilityController->getOfficeAgentOptions('iso_degree')['data']['options'] ?? [];
        $devices_types = $this->office_agent_devices->searchDeviceTypes($request)['data']['deviceTypes'] ?? [];
        $office_order_types = $this->utilityController->getOfficeAgentOptions('office_order_type')['data']['options'] ?? [];
        $lab_types = $this->utilityController->getOfficeAgentOptions('lab_type')['data']['options'] ?? [];
        $nationalities = $this->utilityController->getNationality()['data']['nationality'] ?? [];
        $current_specializations = $office_agent->specializations->pluck('id')->toArray() ?? [];

        $final_decisions = $this->utilityController->officeFinalOpinion($office_agent->id)['data']['options'] ?? [];

        $request->request->add(['user_id' => $user_id]);
        $request->request->add(['office_type_id' => $office_agent->office_type_id]);
        $departments = $this->office_agent_department->getDepartments($request)['data']['departments'] ?? [];

//        return $devices_types;
        return view('pages.officeAgent.orders.office_details.index',
            compact('page_title', 'office_agent', 'office_section_type',
                'office_section_activity', 'another_branch_types', 'contract_types',
                'classification_degrees', 'specializes', 'current_specializations', 'iso_dbs',
                'office_order_types', 'office_file_types', 'human_resource_jobs', 'human_resource_degrees',
                'human_resource_specializations', 'nationalities', 'human_resource_file_types', 'devices_types',
                'partner_attachment_types', 'device_file_types', 'final_decisions', 'departments', 'lab_types', 'branch_types',
                'governorates', 'cities', 'company_type', 'histories')
        );
    }


    public function getRequestHistoryOrdersView(Request $request, $id)
    {
        $page_title = 'get Request Order History';
        $user_id = auth()->user()->id ?? 0;
        $request->request->add(['user_id' => $user_id]);
        // $office_agent = $this->office_agent->findOfficeByIdAdmin($id)['data']['officeAgent'] ?? null;
        $office_agent = $this->office_agent->findHistory($id)['data']['history']['data'] ?? null;

        if (!$office_agent) {
            return back();
        }

        $histories = $this->office_agent->getAllHistory($id)['data']['histories'] ?? [];
        // return $histories;

        // return $office_agent;
        $_office_agent = $this->prepareOfficeAgentData($office_agent);
        $request->request->add(['options' => $_office_agent]);
        $office_section_type = $this->utilityController->getOfficeAgentOptions('office_section_type')['data']['options'] ?? [];
        $office_section_activity = $this->utilityController->getOfficeAgentOptions('office_section_activity')['data']['options'] ?? [];
        $company_type = $this->utilityController->getOfficeAgentOptions('company_type')['data']['options'] ?? [];
        $governorates = $this->utilityController->getGovernment()['data']['governorates'] ?? [];

        $gov_id = $office_agent['main_address']->governorate_id ?? $governorates[0]['id'] ?? null;
        $cities = $this->utilityController->getCity($gov_id)['data']['cities'] ?? [];

        $branch_types = $this->utilityController->getOfficeAgentOptions('branch_type')['data']['options'] ?? [];
        $another_branch_types = $this->utilityController->getOfficeAgentOptions('another_branch_type')['data']['options'] ?? [];
        $contract_types = $this->utilityController->getOfficeAgentOptions('contract_type')['data']['options'] ?? [];
        $classification_degrees = $this->utilityController->getOfficeAgentOptions('classification_degree')['data']['options'] ?? [];
//        $specializes = $this->utilityController->getOfficeAgentOptions('specialize')['data']['options'] ?? [];
        $specializes = $this->utilityController->getOfficeAgentOptions('specialize_' . $office_agent['office_type_id'])['data']['options'] ?? [];
        $office_file_types = $this->utilityController->getOfficeAgentOptions('office_file_type')['data']['options'] ?? [];
        $human_resource_jobs = $this->utilityController->getOfficeAgentOptions('human_resource_job')['data']['options'] ?? [];
        $human_resource_specializations = $this->utilityController->getOfficeAgentOptions('human_resource_specialization')['data']['options'] ?? [];
        $human_resource_degrees = $this->utilityController->getOfficeAgentOptions('human_resource_degree')['data']['options'] ?? [];
        $partner_attachment_types = $this->utilityController->getOfficeAgentOptions('partner_attachment_type')['data']['options'] ?? [];
        $human_resource_file_types = $this->utilityController->getOfficeAgentOptions('human_resource_file_type')['data']['options'] ?? [];
        $device_file_types = $this->utilityController->getOfficeAgentOptions('device_file_type')['data']['options'] ?? [];
        $iso_dbs = $this->utilityController->getOfficeAgentOptions('iso_degree')['data']['options'] ?? [];
        $devices_types = $this->office_agent_devices->searchDeviceTypes($request)['data']['deviceTypes'] ?? [];
        $office_order_types = $this->utilityController->getOfficeAgentOptions('office_order_type')['data']['options'] ?? [];
        $lab_types = $this->utilityController->getOfficeAgentOptions('lab_type')['data']['options'] ?? [];
        $nationalities = $this->utilityController->getNationality()['data']['nationality'] ?? [];
        $current_specializations = collect($office_agent['specializations'])->pluck('id')->toArray() ?? [];

        $final_decisions = $this->utilityController->officeFinalOpinion($office_agent['id'])['data']['options'] ?? [];

        $request->request->add(['user_id' => $user_id]);
        $request->request->add(['office_type_id' => $office_agent['office_type_id']]);
        $departments = $this->office_agent_department->getDepartments($request)['data']['departments'] ?? [];

//        return $devices_types;
        return view('pages.officeAgent.orders.office_details_history.index',
            compact('page_title', 'office_agent', 'office_section_type',
                'office_section_activity', 'another_branch_types', 'contract_types',
                'classification_degrees', 'specializes', 'current_specializations', 'iso_dbs',
                'office_order_types', 'office_file_types', 'human_resource_jobs', 'human_resource_degrees',
                'human_resource_specializations', 'nationalities', 'human_resource_file_types', 'devices_types',
                'partner_attachment_types', 'device_file_types', 'final_decisions', 'departments', 'lab_types', 'branch_types',
                'governorates', 'cities', 'company_type', 'histories')
        );
    }

    public function adminOfficeConfirmUpdateOrder(Request $request, $office_agent_id)
    {
        $user_id = auth()->user()->id ?? 0;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['from_user_id' => $user_id]);
//        return $request->all();
        $response = $this->office_agent_process->create($request);
        if (!$response['status']) {
//            return $response['data']['validation_errors'];
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return redirect()->route('getSearchOrdersView')->with('success', '');
    }

    public function adminOfficeAgentUpdateInfo(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['address_type' => 'main']);
        return $this->office_agent->update($request);
    }

    public function adminOfficeAgentUpdateCompanyAttachment(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent->createOfficeFile($request);
    }

    public function adminHandleCompanyAddPartenerRequest(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_partner->create($request);
    }

    public function adminHandleCompanyAddBranchRequest(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent->createNewAddress($request);
    }

    public function adminAddHumanResourceEmployee(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        if ($request->get('human_resource_id')) {
            $response = $this->office_agent_human_resource->update($request);
            $status = $response['status'];
            $msg = $response['msg'];
            $data = $response['data'];
            $is_create = false;
            return compact('status', 'msg', 'data', 'is_create');
        }
        $response = $this->office_agent_human_resource->create($request);
        $status = $response['status'];
        $msg = $response['msg'];
        $data = $response['data'];
        $is_create = true;
        return compact('status', 'msg', 'data', 'is_create');
    }

    public function adminUpdateHumanResourceEmployee(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_human_resource->update($request);
    }

    public function updateOfficeOrderType(Request $request, $id)
    {

        $response = $this->office_agent->updateOfficeOrderType($id);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return back();
    }

    public function adminOfficeAgentAddEmployeeAttachment(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_human_resource->createHumanResourceFile($request);
    }

    public function adminOfficeAgentAddInstallment(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        if ($request->get('device_id')) {
            $response = $this->office_agent_devices->update($request);
            $status = $response['status'];
            $msg = $response['msg'];
            $data = $response['data'];
            $is_create = false;
            return compact('status', 'msg', 'data', 'is_create');
        }
        $response = $this->office_agent_devices->create($request);
        $status = $response['status'];
        $msg = $response['msg'];
        $data = $response['data'];
        $is_create = true;
        return compact('status', 'msg', 'data', 'is_create');
    }

    public function adminOfficeAgentAddInstallmentAttachment(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_devices->createOfficePartnerFile($request);
    }

    public function adminOfficeAgentUpdateDevice(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_devices->update($request);
    }

    public function adminOfficeAgentAddStudy(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_study->create($request);
    }

    public function adminDeleteofficeAgentStudyRequest(Request $request, $office_agent_id)
    {
        return $this->office_agent_study->delete($request->id);
    }

    public function adminDeleteInstallmentAttachmentRequest(Request $request)
    {
        return $this->office_agent_devices->deleteOfficeAgentFile($request->id);
    }

    public function updateStatusFront($id)
    {
        $response = $this->office_agent->updateStatusFront($id);
        if ($response['status'] ?? null) {
            return back()->with('success', 'تمت العملية بنجاح');
        }
        return back()->with('error', 'Server Error');
    }

    public function updateOfficeRead($id)
    {
        $response = $this->office_agent->updateOfficeIsRead($id);
        if ($response['status'] ?? null) {
            return redirect()->route('getSearchOrdersView')->with('success', 'تمت العملية بنجاح');
        }
        return back()->with('error', 'Server Error');
    }

    public function adminDeleteInstallmentRequest(Request $request)
    {
        return $this->office_agent_devices->delete($request->id);
    }

    public function adminDeleteHumanResourceFileRequest(Request $request)
    {
        return $this->office_agent_human_resource->deleteHumanResourceFile($request->id);
    }

    public function adminDeleteHumanResourceEmployeeRequest(Request $request)
    {
        return $this->office_agent_human_resource->delete($request->id);
    }

    public function adminOfficeAgentDeleteBranchAddress(Request $request)
    {
        return $this->office_agent->deleteAddress($request->id);
    }

    public function adminOfficeAgentDeleteCompanyPartner(Request $request)
    {
        return $this->office_agent_partner->delete($request->id);
    }

    public function adminOfficeAgentDeleteAttachment(Request $request)
    {
        return $this->office_agent->deleteOfficeFile($request->id);
    }

    public function getAttachUsersView(Request $request)
    {

        $page_title = 'Attach Users';
        $departments = $this->office_agent_department->allDepartmentPeople()['data']['departments'] ?? [];
        $users = $this->user->allWithoutPaginate()['data']['users'] ?? [];
        $all_users = $this->office_agent_department->getAttachedPeople()['data']['users'];
//        return $all_users;
        return view('pages.officeAgent.offices.users.index', compact('page_title', 'departments', 'users', 'all_users'));
    }

    public function handleAttachUsers(Request $request)
    {
        $response = $this->office_agent_department->attachUsers($request);
        if (!$response['status']) {
//            return $response;
            return back()->with('error', 'المستخدم مسجل من قبل');
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return back()->with('success', '');
    }

    public function handleDeletAttachedUsers(Request $request)
    {
        return $this->office_agent_department->removeAttachedPeople($request->id);
    }

    public function getOfficesView(Request $request)
    {

        $page_title = 'Offices';
        $request->request->add(['user_id' => getAuthUser()->id ?? null]);
        $officeUsers = $this->office_agent->getAllOfficeAgentUsers($request)['data']['officeUsers'] ?? [];
//        return $officeUsers;
        return view('pages.officeAgent.offices.all.index', compact('page_title', 'officeUsers'));
    }

    public function getFormOfficeView(Request $request, $id)
    {
        $page_title = '';
        $form_data = $this->form->show($id);
        $form_data = $form_data['data']['form'] ?? null;

        if (!$form_data) {
            return back();
        }
        return view('pages.officeAgent.forms.edit_general_form', compact('page_title', 'form_data'));
    }

    public function handleFormOfficeHtml(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        return $this->form->update($request, $request->id);
    }

    public function getRequestChangeNameOrdersView(Request $request, $id)
    {

        $page_title = 'Offices Change Name';
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'company_change_name_fees']);
        $cost = $this->office_agent->getCost($request)['data']['cost'] ?? 0;
        $payment_types = $this->utilityController->getPaymentType()['data']['payment'] ?? [];
        return view('pages.officeAgent.offices.change_name.index', compact('page_title', 'office_agent', 'payment_types', 'cost'));
    }

    public function getRequestReturnOrdersView(Request $request, $id)
    {
        $page_title = 'Offices Missed Document';
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_replacement_fees']);
        $cost = $this->office_agent->getCost($request)['data']['cost'] ?? 0;
        $payment_types = $this->utilityController->getPaymentType()['data']['payment'] ?? [];
        return view('pages.officeAgent.offices.missed_document.index', compact('page_title', 'office_agent', 'payment_types', 'cost'));
    }

    public function getRequestCopyOrdersView(Request $request, $id)
    {
        $page_title = 'Offices Request Copy';
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_original_fees']);
        $cost = $this->office_agent->getCost($request)['data']['cost'] ?? 0;
        $payment_types = $this->utilityController->getPaymentType()['data']['payment'] ?? [];
        return view('pages.officeAgent.offices.make_copy.index', compact('page_title', 'office_agent', 'payment_types', 'cost'));
    }

    public function getErrorFilesView(Request $request, $id)
    {
        $page_title = 'Offices Files Errors';
        $response = $this->office_agent->checkData($id);

        $status = $response['status'];
        $office_agent_errors = $response['data']['office_agent_errors'] ?? null;
        // return $office_agent_errors;
        return view('pages.officeAgent.offices.error_files.index', compact('page_title', 'status', 'office_agent_errors'));
    }


    public function getRequestRenewCertifyView(Request $request, $id)
    {
        $page_title = 'Offices Request Renew Certify';
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_renewal_fees']);
        $cost = $this->office_agent->getCost($request)['data']['cost'] ?? 0;
        $payment_types = $this->utilityController->getPaymentType()['data']['payment'] ?? [];
        return view('pages.officeAgent.offices.renew_certify.index', compact('page_title', 'office_agent', 'payment_types', 'cost'));
    }

    public function getRequestApproveCertifyView(Request $request, $id)
    {
        $page_title = 'Offices Request Approve Certify';
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_purchase']);
        $cost = $this->office_agent->getCost($request)['data']['cost'] ?? 0;
        $payment_types = $this->utilityController->getPaymentType()['data']['payment'] ?? [];
        return view('pages.officeAgent.offices.approve_certify.index', compact('page_title', 'office_agent', 'payment_types', 'cost'));
    }

    public function handleRequestChangeNameOrdersView(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'company_change_name_fees']);
        $response = $this->office_agent->payOfficeAgent($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return redirect()->route('getSearchOrdersView')->with('success', '');
    }

    public function handleRequestReturnOrdersView(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_replacement_fees']);
        $response = $this->office_agent->payOfficeAgent($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return redirect()->route('getSearchOrdersView')->with('success', '');
    }

    public function handleRequestCopyOrdersView(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_original_fees']);
        $response = $this->office_agent->payOfficeAgent($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return redirect()->route('getSearchOrdersView')->with('success', '');
    }

    public function handleRequestApproveCertifyView(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_purchase']);
        $response = $this->office_agent->payOfficeAgent($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return redirect()->route('getSearchOrdersView')->with('success', '');
    }

    public function handleRequestRenewCertifyView(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_renewal_fees']);
        $response = $this->office_agent->payOfficeAgent($request);
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return redirect()->route('getSearchOrdersView')->with('success', '');
    }

    public function getFormCertify(Request $request, $id, $type)
    {
        $page_title = '';
        $form_data = $this->form->findWithType($type)['data']['form'] ?? null;
        if (!$form_data) {
            return back();
        }
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }

        $certificate_id = $request->certificate_id;
        $certificate = null;
        if ($certificate_id) {
            $certificate = $this->office_agent->findCertificate($certificate_id)['data']['certificate'] ?? null;
        }

        return view('pages.officeAgent.forms.extract_general_form', compact('page_title', 'form_data', 'office_agent', 'certificate'));
    }

    public function getStopCertifyView(Request $request, $id)
    {
        $page_title = 'Offices Stop Certify';
        $office_agent = $this->office_agent->findOfficeById($id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $officeInactive = $this->office_agent_inactive->all($office_agent->id)['data']['officeInactive'] ?? [];
        $request->request->add(['id' => $id]);
        $request->request->add(['type' => 'certificate_purchase']);
        $cost = $this->office_agent->getCost($request)['data']['cost'] ?? 0;
        $payment_types = $this->utilityController->getPaymentType()['data']['payment'] ?? [];
        return view('pages.officeAgent.offices.certificate_reject.index', compact('page_title', 'office_agent', 'payment_types', 'cost', 'officeInactive'));
    }

    public function handleRequestRejectCertifyView(Request $request, $id)
    {
        $request->request->add(['office_agent_id' => $id]);

        $response = $this->office_agent_inactive->create($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        return back()->with('success', '');
    }

    public function deleteStopCertify(Request $request)
    {
        return $this->office_agent_inactive->delete($request->id);
    }

    public function getAllLocations(Request $request)
    {
        $page_title = 'All Locations';
        $governorates = $this->locations->allGovernorates()['data']['governorates'] ?? [];

        return view('pages.officeAgent.locations.all.index', compact('page_title', 'governorates'));
    }

    public function createAllLocations(Request $request)
    {
        $page_title = 'createAllLocations';
        return view('pages.officeAgent.locations.add.index', compact('page_title'));
    }

    public function handleCreateAllLocations(Request $request)
    {

        $response = $this->locations->storeGovernorate($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return redirect()->route('getAllLocations')->with('success', '');
    }

    public function editAllLocations(Request $request, $id)
    {
        $page_title = 'editAllLocations';
        $governorate = $this->locations->findGovernorate($id)['data']['governorate'] ?? null;

        if (!$governorate) {
            return back()->with('error', '');
        }

        return view('pages.officeAgent.locations.edit.index', compact('page_title', 'governorate'));
    }

    public function handleUpdataAllLocations(Request $request, $id)
    {

        $this->locations->updateGovernorate($request, $id);
        return back();
    }

    public function handleDeleteLocations(Request $request)
    {
        return $this->locations->deleteGovernorate($request->id);
    }

    public function getProcessView(Request $request, $office_agent_id)
    {
        $page_title = 'get Process View';
        $office_agent = $this->office_agent->findOfficeById($office_agent_id)['data']['officeAgent'] ?? null;

        if ($office_agent) {
            $companyName = $office_agent->office_name_ar ?? $office_agent->office_name_en;
            $processes = $office_agent->processes->sortByDesc('id');
            return view('pages.officeAgent.orders.getProcessView.index', compact('page_title', 'companyName', 'processes'));
        }
        return back();
    }

    public function getLoggerReportView(Request $request)
    {
        $page_title = 'getLoggerReportView';

        $officeAgents = $this->office_agent->getAllOfficeAgentCompanies($request)['data']['officeAgents'] ?? [];
        $filter = [
            'office_agent_id' => $request->get('office_agent_id'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ];
        $processes = [];
        if ($filter['office_agent_id'] ?? null) {
            $office_agent = $this->office_agent->findOfficeById($filter['office_agent_id'])['data']['officeAgent'] ?? null;
            if ($office_agent) {

                $processes = $office_agent->processes;
                $processes = $processes->filter(function ($process) use ($filter) {
                    $created_at = Carbon::parse($process->created_at ?? null)->startOfDay();
                    if (($filter['start_date'] ?? null) && ($filter['end_date'] ?? null)) {
                        $start_date = Carbon::parse($filter['start_date'] ?? null)->startOfDay();
                        $end_date = Carbon::parse($filter['end_date'] ?? null)->startOfDay();
                        return $created_at >= $start_date && $created_at <= $end_date;
                    }
                    return true;
                });
            }
        }

        return view('pages.officeAgent.reports.getLoggerReportView.index', compact('page_title', 'officeAgents', 'processes'));
    }


    public function getOfficeEmployeeReportView(Request $request)
    {
        $page_title = 'getOfficeEmployeeReportView';

        $officeAgents = $this->office_agent->getAllOfficeAgentCompanies($request)['data']['officeAgents'] ?? [];
        $filter = [
            'office_agent_id' => $request->get('office_agent_id'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ];

        $human_resources = [];
        if ($filter['office_agent_id'] ?? null) {
            $office_agent = $this->office_agent->findOfficeById($filter['office_agent_id'])['data']['officeAgent'] ?? null;

            if ($office_agent) {

                $human_resources = $office_agent->human_resources;
            }
        }

        return view('pages.officeAgent.reports.getOfficeEmployeeReportView.index', compact('page_title', 'officeAgents', 'human_resources'));
    }


    public function getOfficePaymentsReportView(Request $request)
    {
        $page_title = 'getOfficeEmployeeReportView';

        $activities = $this->office_agent_activiy->all()['data']['activities'] ?? [];


        $filter = [
            'office_type_id' => $request->get('office_type_id'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ];

        $payments = [];
//        if ($filter['office_agent_id'] ?? null) {
//            $office_agent = $this->office_agent->findOfficeById($filter['office_agent_id'])['data']['officeAgent'] ?? null;
//
//            if ($office_agent) {
//
//                $payments = $office_agent->payments;
//            }
//        }
        if ($filter['office_type_id'] ?? null) {
            $payments = $this->office_agent->getPaymentsByOfficeType($request)['data']['payments'] ?? [];
        }

        return view('pages.officeAgent.reports.getOfficePaymentsReportView.index', compact('page_title', 'activities', 'payments'));
    }

    public function getOfficeApprovedReportView(Request $request)
    {
        $page_title = 'getOfficeApprovedReportView';

        $activities = $this->office_agent_activiy->all()['data']['activities'] ?? [];
        $classification_degrees = $this->utilityController->getOfficeAgentOptions('classification_degree')['data']['options'] ?? [];


        $filter = [
            'classification_degree_id' => $request->get('classification_degree_id'),
            'office_type_id' => $request->get('office_type_id'),
            'order_status_id' => 1,
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ];

        $companies = [];

        if ($filter['office_type_id'] ?? null) {
            $companies = $this->office_agent->getAllOfficeAgentCompanies($request)['data']['officeAgents'] ?? [];
        }
        // return $companies;

        return view('pages.officeAgent.reports.getOfficeApprovedReportView.index', compact('page_title', 'classification_degrees', 'activities', 'companies'));
    }

    public function getOfficeAgentsReportView(Request $request)
    {
        $page_title = 'getOfficeAgentsReportView';

        $officeAgents = $this->office_agent->getAllOfficeAgentCompanies($request)['data']['officeAgents'] ?? [];

        return view('pages.officeAgent.reports.getOfficeAgentsReportView.index', compact('page_title', 'officeAgents'));
    }

    public function getOfficeAgentDevicesReportView(Request $request)
    {
        $page_title = 'getOfficeAgentDevicesReportView';

        $officeAgents = $this->office_agent->getAllOfficeAgentCompanies($request)['data']['officeAgents'] ?? [];
        $officeAgentDevices = $this->office_agent_devices->all($request->office_agent_id)['data']['officeDevices'] ?? [];

        return view('pages.officeAgent.reports.getOfficeAgentDevicesReportView.index', compact('page_title', 'officeAgents', 'officeAgentDevices'));
    }

    public function getManagerUserView(Request $request)
    {
        $page_title = 'getManagerUserView';

        $user_id = getAuthUser()->id ?? '';
        $request->request->add(['user_id' => $user_id]);
        $all_users = $this->office_agent_department->getAllUsersInSameDepartment($request)['data']['users'] ?? [];
//        return $all_users;

        return view('pages.officeAgent.offices.getManagerUserView.index', compact('page_title', 'all_users'));
    }

    public function handleManagerUserRequest(Request $request)
    {
        $id = $request->get('id');
        $user_id = getAuthUser()->id ?? '';
        $request->request->add(['user_id' => $id]);
        $request->request->add(['manager_id' => $user_id]);

        return $this->office_agent_department->updateUserDepartmentForManager($request);
    }

    public function getAllActivitiesView(Request $request)
    {
        $page_title = 'getAllActivitiesView';

        $activities = $this->office_agent_activiy->all()['data']['activities'];

        return view('pages.officeAgent.offices.getAllActivitiesView.index', compact('page_title', 'activities'));
    }

    public function getAllActivitiesDecisionsView(Request $request, $id)
    {
        $page_title = 'getAllActivitiesDecisionsView';

        $decisions = $this->office_decision_ctrl->getActivityDecisions($id);

        return view('pages.officeAgent.offices.getAllActivitiesDecisionsView.index', compact('page_title', 'decisions'));
    }

    public function handleAllActivitiesDecisionsRequest(Request $request, $id)
    {
        $request->request->add(['activity_id' => $id]);
        $response = $this->office_decision_ctrl->create($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return redirect()->route('getAllActivitiesDecisionsView', ['id' => $id])->with('success', '');
    }

    public function handleDeleteActivitiesDecisionsRequest(Request $request)
    {
        return $this->office_decision_ctrl->delete($request->id);
    }

    public function editAllActivitiesView(Request $request, $id)
    {
        $page_title = 'editAllActivitiesView';

        $activity = $this->office_agent_activiy->find($id)['data']['activity'];
        $file_types = $this->office_agent_activiy->getAllFileTypes()['data']['file_types'];

//        return $file_types;

        $file_types_ids = $activity->file_types->pluck('id')->toArray();

        return view('pages.officeAgent.offices.editAllActivitiesView.index', compact('page_title', 'activity', 'file_types', 'file_types_ids'));
    }

    public function handleEditAllActivitiesView(Request $request, $id)
    {
        $request->request->add(['activity_id' => $id]);
        $this->office_agent_activiy->attachFileTypes($request);

        return back();
    }

    public function getOfficeAgentLoggerView(Request $request, $id)
    {
        $page_title = 'اللوجر';
        $officeAgent = $this->office_agent->getOfficeAgentLog($id)['data']['officeAgent'] ?? null;
        $loggerData = $this->office_agent->getOfficeAgentLog($id)['data']['officeAgent']['loggerData'] ?? [];
        return view('pages.officeAgent.offices.logger.index', compact('page_title', 'officeAgent', 'loggerData'));

    }

    public function getIsoCertView(Request $request)
    {
        $page_title = 'شهادات الايزو';
        $isos = $this->office_iso_ctrl->all()['data']['iso'] ?? [];
        $activities = $this->office_agent_activiy->all()['data']['activities'] ?? [];
        return view('pages.officeAgent.offices.iso_cert.index', compact('page_title', 'isos', 'activities'));

    }

    public function handleIsoCertRequest(Request $request)
    {
        $page_title = 'شهادات الايزو';
        $response = $this->office_iso_ctrl->create($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return redirect()->route('getIsoCertView')->with('success', '');
    }

    public function deleteIso(Request $request)
    {
        return $this->office_iso_ctrl->delete($request->id);
    }

    public function adminHandleOutterAttachment(Request $request, $office_agent_id)
    {
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_external_attachment->create($request);
    }

    public function adminOfficeAgentDeleteExternalAttachment(Request $request, $office_agent_id)
    {
        return $this->office_external_attachment->delete($request->id);
    }

    public function getOfficeAsbestosView(Request $request)
    {
        $page_title = 'getOfficeAsbestosView';
        $orders = $this->office_asbestos_ctrl->all()['data']['orders'] ?? [];
        $orders = custom_paginate($orders);
        return view('pages.officeAgent.asbestos.all.index', compact('orders', 'page_title'));
    }

    public function showOfficeAsbestosOrder(Request $request, $id)
    {
        $page_title = 'showOfficeAsbestosOrder';
        $order = $this->office_asbestos_ctrl->find($id)['data']['order'] ?? null;
        if (!$order) {
            return back();
        }

        return view('pages.officeAgent.asbestos.show.index', compact('order', 'page_title'));
    }

    public function deleteOfficeAsbestosOrder(Request $request)
    {
        return $this->office_asbestos_ctrl->delete($request->id);
    }

    public function getEditCompanyReportView(Request $request)
    {

        $page_title = 'تاريخ تعديل بيانات الشركة';
        $request->request->add(['office_type_id' => '1']);
        $officeAgents = $this->office_agent->getAllOfficeAgentCompanies($request)['data']['officeAgents'] ?? [];
        $filter = [
            'office_agent_id' => $request->get('office_agent_id'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ];

        $office_agent_updated = null;
        if ($filter['office_agent_id'] ?? null) {
            $office_agent_updated = $this->office_agent->getUpdatedEntity($filter['office_agent_id'])['data']['data'] ?? null;
        }

        return view('pages.officeAgent.reports.getEditCompanyReportView.index', compact('page_title', 'officeAgents', 'office_agent_updated'));

    }
}
