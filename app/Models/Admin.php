<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'mobile', 'role_id','azure_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }



    public function hasAccess($permission)
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }
        $permissions = $role->permissions->pluck('name')->toArray();
        if (in_array($permission, $permissions)) {
            return true;
        }
        return false;
    }

    public function checkFullAccess()
    {
        $check =  null;
        if($this->role){
            $check = $this->role->checkFullPermissions();
        }
        if ($check){
            return true;
        }
        return false;
    }
}
