<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'content',
        'view',
        'image',
        'status',
        'slug',
        'category_id',
        'subcat_id'
    ]; 
}
