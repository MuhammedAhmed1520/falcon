<?php

namespace App\Modules\Role;

use App\Models\Permission;
use App\Support\Repository;
use App\Models\Role as RoleModel;

class Role
{
    /**
     * Instance Of Common Repository
     */
    protected $repository;

    /**
     * Instance Of RoleModel
     */
    protected $roleModel;

    public function __construct()
    {
        $this->repository = new  Repository();
        $this->roleModel = new RoleModel;
    }

    //Create New Role
    public function create(array $data)
    {
        $permissionData = $data['permissions'] ?? [];
        if (count($permissionData) > 0) {
            unset($data['permissions']);
        }
        $role = $this->repository->create($this->roleModel, $data);

        $role->permissions()->sync($permissionData);
        return return_msg(true, 'Role Successfully Added', compact('role'));
    }

    //get All Roles
    public function all()
    {
//        $roles = $this->repository->all($this->roleModel);
        $roles = $this->roleModel->withCount(['users'])->get();
        return return_msg(true, 'Role Successfully Returned', compact('roles'));
    }

    // Find Role
    public function find($id)
    {
//        $role = $this->repository->find($this->roleModel, $id);
        $role = $this->roleModel->with(['users'])->find($id);
        if (!$role) {
            return return_msg(false, 'Role Not Found');
        }
        $role = $role->load('permissions');
        return return_msg(true, 'Role  Successfully Returned', compact('role'));
    }

    // Delete RoleByID
    public function delete($id)
    {
        $role = $this->repository->find($this->roleModel, $id);
        if (!$role) {
            return return_msg(false, 'Role Not Found');
        }
        if (count($role->users) == 0) {
            //Delete Role
            $role = $this->repository->delete($role);
            if ($role) {
                return return_msg(true, 'Role Successfully Deleted');
            }
        }
        return return_msg(false, 'Deleted Failed Because User Is used This Permission');
    }

    // Update Role
    public function update($data)
    {
        $id = $data['id'] ?? null;
        if (!$id) {
            return return_msg(false, 'Id Not Set');
        }
        //Find Role  by id
        $role = $this->repository->find($this->roleModel, $id);
        if (!$role) {
            return return_msg(false, 'Role Not Found');
        }
        $permissionData = $data['permissions'] ?? [];
        if (count($permissionData) > 0) {
            unset($data['permissions']);
        }
        $this->repository->update($role, $data);
        $role->permissions()->sync($permissionData);
        //Update this Role
        return return_msg(true, 'Role Successfully Updated');
    }

    public function getPermission()
    {

        $permissions = Permission::all()->groupBy('for');
        return return_msg(true, 'Permission Successfully Returned', compact('permissions'));
    }


}
