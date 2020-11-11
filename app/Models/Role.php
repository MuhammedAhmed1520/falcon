<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = ['title', 'route_name'];


    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    public function checkFullPermissions()
    {
        $permissions = $this->permissions->pluck('id')->toArray();
        $fullPermissions = Permission::all();
//        $fullPermissions = $fullPermissions->pluck('id')->toArray();
//        $diff = array_diff($permissions,$fullPermissions);
//        if (count($diff) > 0){
//            return false;
//
//        }
        if (count($permissions) < count($fullPermissions)) {
            return false;
        }
        return true;
    }
}
