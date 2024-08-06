<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use App\Models\CommentReply;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected  $fillable = [
        'content',
        'user_id',
        'post_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentReplys() {
        return $this->hasMany(CommentReply::class, 'comment_id');
    }

}
