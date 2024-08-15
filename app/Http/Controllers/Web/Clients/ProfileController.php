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
        $pending = $this->postService->countPost('pending', 'status');
        $draft = $this->postService->countPost('draft', 'status');
        $published = $this->postService->countPost('published', 'status');
        $archived = $this->postService->countPost('archived', 'status');
        $rejected = $this->postService->countPost('rejected', 'status');
        return view('clients.profile.profile', compact('posts', 'comments', 'pending', 'draft', 'published', 'archived', 'rejected'));
    }
}
