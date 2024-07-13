<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';
    protected $fillable = [
        'name',
        'description',
        'slug',
        'category_id'
    ]; 

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
