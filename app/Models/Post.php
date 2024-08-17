<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

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
        'author_id',
        'category_id',
        'subcat_id'
    ]; 

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class, 'subcat_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeMostViewed($query) {
        return $query->orderByDesc('view');
    }

    public function scopePostRand($query) {
        return $query->inRandomOrder();
    }
}
