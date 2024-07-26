<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;
use App\Models\RolePermission;
use App\Models\Action;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'name',
        'description',
        'type'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions')
                    ->withPivot('action_id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class, 'role_permissions');
    }
}
