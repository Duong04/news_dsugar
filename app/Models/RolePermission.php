<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Action;
use App\Models\Permission;
use App\Models\Role;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = 'role_permissions';
    protected $fillable = [
        'permission_id',
        'role_id',
        'action_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
