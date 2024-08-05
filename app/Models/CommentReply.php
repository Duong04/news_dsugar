<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;
    protected $table = 'comment_reply';
    protected  $fillable = [
        'content',
        'user_id',
        'comment_id',
    ];
}
