<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subcategory;
use App\Models\Post;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected  $fillable = [
        'name',
        'description',
        'slug',
        'image'
    ];

    public function subcategories() {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'category_id');
    }
}
