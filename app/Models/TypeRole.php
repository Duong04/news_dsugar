<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRole extends Model
{
    use HasFactory;

    protected $table = 'type_roles';
    protected $fillable = [
        'name',
        'redirect_url'
    ];
}
