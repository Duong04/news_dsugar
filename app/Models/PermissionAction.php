<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Action;
use App\Models\Permission;

class PermissionAction extends Model
{
    use HasFactory;
    protected $table = 'permission_action';

    protected $fillable = [
        'action_id',
        'permission_id',
    ];

    protected $hidden = [
        'created_at',  
        'updated_at',  
    ];

}
