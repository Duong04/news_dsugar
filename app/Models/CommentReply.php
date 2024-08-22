<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class CommentReply extends Model
{
    use HasFactory;
    protected $table = 'comment_reply';
    protected  $fillable = [
        'content',
        'user_id',
        'comment_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment() {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
