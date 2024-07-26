<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Action;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'created_at',  
        'updated_at',  
        'deleted_at',  
        'pivot'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions')
                    ->withPivot('action_id')
                    ->withTimestamps();
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class, 'role_permissions', 'permission_id', 'action_id');
    }
}
