<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Api\UtilityController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RoleController as RoleCTRL;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    private $role;
    private $utility;

    public function __construct()
    {
        $this->role = new RoleCTRL();
        $this->utility = new UtilityController();
    }

    protected function getRedirectRoute()
    {
        return [
            [
                'route_name' => 'getDashboardView',
                'title_ar' => 'الصفحة الرئيسية',
                'title_en' => 'Dashboard',
            ],
            [
                'route_name' => 'allViolations',
                'title_ar' => 'قسم المخالفات / عرض جميع المخالفات',
                'title_en' => 'Violation / Show All Violations',
            ],
            [
                'route_name' => 'allOfficers',
                'title_ar' => 'قسم المخالفات / عرض جميع الضباط',
                'title_en' => 'Violation / Show All Officers',
            ],
            [
                'route_name' => 'allTenders',
                'title_ar' => 'قسم الممارسات / عرض جميع الممارسات',
                'title_en' => 'Tenders / Show All Tenders',
            ],
            [
                'route_name' => 'allCompanies',
                'title_ar' => 'قسم الممارسات / عرض جميع الشركات',
                'title_en' => 'Tenders / Show All Companies',
            ],
            [
                'route_name' => 'allCertificate',
                'title_ar' => 'قسم شهادات عدم وجود محاضر بمخالفات بيئية',
                'title_en' => 'All Certificates Of None Violation',
            ],
            [
                'route_name' => 'getSearchOrdersView',
                'title_ar' => 'قسم الاعتماد البيئي / عرض جميع الطلبات الواردة',
                'title_en' => 'Office Agent / All Orders',
            ],
            [
                'route_name' => 'getOfficesView',
                'title_ar' => 'قسم الاعتماد البيئي / عرض جميع حسابات الشركات - المستثمرين',
                'title_en' => 'Office Agent / All Companies',
            ],
            [
                'route_name' => 'allVisits',
                'title_ar' => 'تصريح زيارة محمية الجهراء',
                'title_en' => 'تصريح زيارة محمية الجهراء',
            ],
        ];
    }

    public function index()
    {
        $page_title = 'ALL Roles';
        $response = $this->role->index();
        $roles = collect([]);


        if ($response['status']) {
            $roles = $response['data']['roles'];
        }
        return view('pages.settings.roles.all.index', compact('page_title', 'roles'));
    }

    public function create()
    {
        $page_title = 'Create Roles';
        $permissions = $this->utility->getPermission()['data']['permissions'] ?? [];
        $redirect_routes = $this->getRedirectRoute();

        return view('pages.settings.roles.add.index', compact('page_title', 'permissions', 'redirect_routes'));
    }


    public function store(Request $request)
    {
        $response = $this->role->store($request);

        if (!$response['status']) {
            return back()->withInput()->withErrors($response['data']['validation_errors']);
        }


        return redirect()->route('allRoles')->with('success', __('violation.add_success'));
    }

    public function getRoleUsers(Request $request, $id)
    {
        $page_title = ' Role Users';
        $response = $this->role->show($id);
        if (!$response['status'] ?? null) {
            return back()->withInput()->withErrors($response['data']['validation_errors'] ?? null);
        }
        $role = $response['data']['role'] ?? null;

        return view('pages.settings.roles.roleUsers.index', compact('page_title', 'role'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = 'Edit Roles';
        $response = $this->role->show($id);
        $role = null;
        $permissions = $this->utility->getPermission()['data']['permissions'] ?? [];
        $redirect_routes = $this->getRedirectRoute();

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        $role = $response['data']['role'];
        $role = $role->makeHidden('permissions');
        $role->permission_ids = $role->permissions->pluck('id') ?? [];

        return view('pages.settings.roles.edit.index', compact('page_title', 'role', 'permissions', 'redirect_routes'));

    }

    public function update(Request $request, $id)
    {
        $response = $this->role->update($request, $id);

        if (!$response['status']) {
            return back()->with('danger', __('violation.error'));
        }

        return back()->with('info', __('violation.edit_success'));
    }

    public function delete(Request $request)
    {
        $id = $request->id ?? 0;

        return $this->role->destroy($id);
    }
}
