<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class officeAgentController extends Controller
{
    //
    private $utilityController;
    private $office_agent;
    private $office_agent_partner;
    private $office_agent_human_resource;
    private $office_agent_devices;
    private $office_agent_study;
    private $office_agent_activiy;
    private $office_agent_iso;
    private $form;
    private $office_agent_asbestosis;

    public function __construct()
    {
        $this->utilityController = new UtilityController();
        $this->form = new FormController();
        $this->office_agent = new \App\Http\Controllers\Api\OfficeAgent\OfficeAgentController();
        $this->office_agent_partner = new \App\Http\Controllers\Api\OfficeAgent\OfficePartnerController();
        $this->office_agent_human_resource = new \App\Http\Controllers\Api\OfficeAgent\HumanResourceController();
        $this->office_agent_devices = new \App\Http\Controllers\Api\OfficeAgent\OfficeDeviceController();
        $this->office_agent_study = new \App\Http\Controllers\Api\OfficeAgent\OfficeStudyController();
        $this->office_agent_activiy = new \App\Http\Controllers\Api\OfficeAgent\OfficeActivityController();
        $this->office_agent_iso = new \App\Http\Controllers\Api\OfficeAgent\OfficeIsoController();
        $this->office_agent_asbestosis = new \App\Http\Controllers\Api\OfficeAgent\OfficeOrderAsbestosController();
    }

    public function mainActivity(Request $request)
    {
        $page_title = '';
        return view('frontsite.pages.officeAgent.activities.index', compact('page_title'));
    }

    public function mainActivityOne(Request $request)
    {
        $page_title = '';
        $request->request->add(['office_type_id' => 1]);
        $officeAgents = $this->office_agent->getAllOfficeAgentsFront($request)['data']['officeAgents'] ?? [];
        try {
            $officeAgents = collect($officeAgents)->groupBy('classification_degree_id');
        } catch (\Exception $exception) {
            $officeAgents = [
                16 => [],
                17 => [],
            ];
        }
        return view('frontsite.pages.officeAgent.activities.pdf1', compact('page_title', 'officeAgents'));
    }

    public function mainActivityTwoThree(Request $request)
    {
        $page_title = '';

        $request->request->add(['office_type_id' => 2]);
        $officeAgentsCheck = $this->office_agent->getAllOfficeAgentsFront($request)['data']['officeAgents'] ?? [];

        $request->request->add(['office_type_id' => 3]);
        $officeAgentsLab = $this->office_agent->getAllOfficeAgentsFront($request)['data']['officeAgents'] ?? [];

        return view('frontsite.pages.officeAgent.activities.pdf3', compact('page_title', 'officeAgentsCheck', 'officeAgentsLab'));
    }

    public function mainActivityFour(Request $request)
    {
        $page_title = '';
        $request->request->add(['office_type_id' => 4]);
        $officeAgents = $this->office_agent->getAllOfficeAgentsFront($request)['data']['officeAgents'] ?? [];
//        return $officeAgents;

        return view('frontsite.pages.officeAgent.activities.pdf4', compact('page_title', 'officeAgents'));
    }

    public function payOfficeAgent(Request $request)
    {
        $request->request->add(['payment_type_id' => 2]);
        return $this->office_agent->payOfficeAgent($request);
    }

    public function index(Request $request)
    {
        $page_title = '';
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $office_agent = $this->office_agent->findOfficeById($office_agent_id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }

// return $office_agent;
        if ($office_agent->payment_status) {
            $link = $office_agent->payment_status;
            return view('frontsite.pages.officeAgent.abort.index', compact('page_title', 'link'));
        }

        $_data['options'] = $office_agent;
        $request->request->add($_data);
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
        $lab_types = $this->utilityController->getOfficeAgentOptions('lab_type')['data']['options'] ?? [];
        $nationalities = $this->utilityController->getNationality()['data']['nationality'] ?? [];
        $current_specializations = $office_agent->specializations->pluck('id')->toArray() ?? [];
        $iso_dbs = $this->utilityController->getOfficeAgentOptions('iso_degree')['data']['options'] ?? [];
        $devices_types = $this->office_agent_devices->searchDeviceTypes($request)['data']['deviceTypes'] ?? [];
        $isos = $this->office_agent_iso->all($office_agent->office_type_id)['data']['iso'] ?? [];

        return view('frontsite.pages.officeAgent.office_details.index',
            compact('page_title', 'office_agent', 'office_section_type',
                'office_section_activity', 'another_branch_types', 'contract_types',
                'classification_degrees', 'specializes', 'current_specializations',
                'office_file_types', 'human_resource_jobs', 'human_resource_degrees', 'devices_types',
                'human_resource_specializations', 'nationalities', 'human_resource_file_types', 'branch_types',
                'partner_attachment_types', 'device_file_types', 'iso_dbs', 'lab_types', 'isos',
                'governorates', 'cities', 'company_type')
        );
    }


    public function officeAgentUpdateInfo(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['address_type' => 'main']);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent->update($request);
    }

    public function officeAgentUpdateCompanyAttachment(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent->createOfficeFile($request);
    }

    public function officeAgentDeleteAttachment(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent->deleteOfficeFile($request->id);
    }


    public function handleCompanyAddPartenerRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_partner->create($request);
    }

    public function officeAgentDeleteCompanyPartner(Request $request)
    {
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_partner->delete($request->id);
    }


    public function handleCompanyAddBranchRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
//        $request->request->add(['branch_type_id' => $request->branch_type_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent->createNewAddress($request);
    }

    public function officeAgentDeleteBranchAddress(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent->deleteAddress($request->id);
    }


    public function AddHumanResourceEmployee(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);

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

    public function updateHumanResourceEmployee(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_human_resource->update($request);
    }

    public function deleteHumanResourceEmployeeRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_human_resource->delete($request->id);
    }

    public function officeAgentAddEmployeeAttachment(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_human_resource->createHumanResourceFile($request);
    }

    public function deleteHumanResourceFileRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_human_resource->deleteHumanResourceFile($request->id);
    }


    public function officeAgentAddInstallment(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);

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

    public function officeAgentUpdateDevice(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_devices->update($request);
    }

    public function deleteInstallmentRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_devices->delete($request->id);
    }

    public function officeAgentAddInstallmentAttachment(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_devices->createOfficePartnerFile($request);
    }

    public function deleteInstallmentAttachmentRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_devices->deleteOfficeAgentFile($request->id);
    }


    public function officeAgentAddStudy(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        return $this->office_agent_study->create($request);
    }

    public function deleteofficeAgentStudyRequest(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        return $this->office_agent_study->delete($request->id);
    }


    public function login(Request $request)
    {
        $page_title = 'Login';
        return view('frontsite.pages.officeAgent.login.index', compact('page_title'));
    }

    public function abort(Request $request)
    {
        $page_title = 'abort';
        return view('frontsite.pages.officeAgent.abort.index', compact('page_title'));
    }

    public function handleLoginRequest(Request $request)
    {
        $response = $this->office_agent->login($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        return redirect()->route('index-office-agent');
    }

    public function register(Request $request)
    {
        $page_title = 'Register';
        $types = $this->utilityController->getOfficeAgentOptions('office_type')['data']['options'] ?? [];
        $office_agent_activies = $this->office_agent_activiy->all()['data']['activities'] ?? [];
//        return $office_agent_activies;
        return view('frontsite.pages.officeAgent.register.index', compact('page_title', 'types', 'office_agent_activies'));
    }

    public function handleRegisterRequest(Request $request)
    {
        $response = $this->office_agent->register($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }
        if ($response['data']['payment_link'] ?? null) {
            return redirect($response['data']['payment_link'] ?? null);
        }
        return redirect()->route('loginOfficeAgent');
    }

    public function logoutOfficeAgent(Request $request)
    {
        auth('agent')->logout();
        return redirect()->route('loginOfficeAgent');
    }

    public function reset_password(Request $request)
    {
        $page_title = '';
        return view('frontsite.pages.officeAgent.reset_password.index', compact('page_title'));
    }

    public function update_profile_office(Request $request)
    {
        $page_title = '';
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $office_agent = $this->office_agent->findOfficeById($office_agent_id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
//        return $office_agent;
        return view('frontsite.pages.officeAgent.update_profile_office.index', compact('page_title', 'office_agent'));
    }

    public function handle_update_profile_office(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);

        $response = $this->office_agent->updatePhoneAndEmail($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return redirect()->route('index-office-agent');
    }

    public function handle_reset_password(Request $request)
    {
        $office_agent_id = auth('agent')->user()->id ?? null;
        $request->request->add(['office_agent_user_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        $response = $this->office_agent->updatePassword($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return $this->logoutOfficeAgent($request);
    }

    public function getAgentCertify(Request $request, $type)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $certificate_id = $request->certificate_id;
        $office_agent = $this->office_agent->findOfficeById($office_agent_id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        $form_data = $this->form->findWithType($type)['data']['form'] ?? null;
        if (!$form_data) {
            return back();
        }

        $certificate = null;
        if($certificate_id){
            $certificate = $this->office_agent->findCertificate($certificate_id)['data']['certificate'] ?? null;
        }
        // return $certificate;
        return view('pages.officeAgent.forms.extract_front_general_form', compact('page_title', 'form_data', 'office_agent','certificate'));
    }

    public function sendFinalOfficeData(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['is_front' => 1]);
        $response = $this->office_agent->endorse($office_agent_id);
        if (!$response['status']) {
            $errors = $response['data']['office_agent_errors'];
            return back()->with('office_agent_errors', $errors);
        }
        return back()->with('success', 'تم الارسال بنجاح');
    }

    public function remove_asbestosis(Request $request)
    {
        $page_title = '';
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $office_agent = $this->office_agent->findOfficeById($office_agent_id)['data']['officeAgent'] ?? null;
        if (!$office_agent) {
            return back();
        }
        return view('frontsite.pages.officeAgent.remove_asbestosis.index', compact('page_title', 'office_agent'));
    }

    public function handle_remove_asbestosis(Request $request)
    {
        $office_agent_id = auth('agent')->user()->office_agent_id ?? null;
        $request->request->add(['office_agent_id' => $office_agent_id]);
        $request->request->add(['is_front' => 1]);
        $response = $this->office_agent_asbestosis->create($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return back()->with('success', 'تم الارسال بنجاح');
    }

    public function getPassword()
    {
        $page_title = 'getPassword';

        return view('frontsite.pages.officeAgent.getPassword.index', compact('page_title'));
    }

    public function handleGetPasswordRequest(Request $request)
    {
        $response = $this->office_agent->getPassword($request);
        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }
        return back()->with('success', 'تم الارسال بنجاح');
    }
}
