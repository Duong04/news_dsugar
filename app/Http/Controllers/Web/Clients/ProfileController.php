<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\CommentService;
use Auth;

class ProfileController extends Controller
{
    private $postService;
    private $commentService;
    public function __construct(PostService $postService, CommentService $commentService) {
        $this->postService = $postService;
        $this->commentService = $commentService;
    }
    public function account() {
        $userId = Auth::user()->id;
        $comments = $this->commentService->getCommentByAuthor($userId);
        $posts = $this->postService->getPostByUserId($userId);
        return view('clients.profile.profile', compact('posts', 'comments'));
    }
}
