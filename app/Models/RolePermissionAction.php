<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermissionAction extends Model
{
    use HasFactory;
    protected $table = 'role_permission_actions';
    protected $fillabel = [
        'role_permission_id',
        'action_id'
    ];
}
