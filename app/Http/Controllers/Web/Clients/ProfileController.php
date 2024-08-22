<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\CommentService;
use App\Models\Post;
use App\Http\Requests\Web\Clients\ProfileRequest;
use Auth;

class ProfileController extends Controller
{
    private $postService;
    private $commentService;
    private $userService;
    public function __construct(PostService $postService, CommentService $commentService, UserService $userService) {
        $this->postService = $postService;
        $this->commentService = $commentService;
        $this->userService = $userService;
    }
    public function account() {
        $userId = Auth::user()->id;
        $comments = $this->commentService->getCommentByAuthor($userId);
        $posts = $this->postService->getPostByUserId($userId);
        $pending = $this->postService->countPost('pending', $userId, 'status');
        $draft = $this->postService->countPost('draft', $userId, 'status');
        $published = $this->postService->countPost('published', $userId, 'status');
        $archived = $this->postService->countPost('archived', $userId, 'status');
        $rejected = $this->postService->countPost('rejected', $userId, 'status');
        return view('clients.profile.profile', compact('posts', 'comments', 'pending', 'draft', 'published', 'archived', 'rejected'));
    }

    public function updateProfile(ProfileRequest $request, $id) {
        $userSuccess = $this->userService->updateProdile($request);
        if ($userSuccess) {
            toastr()->success('Cập nhật thông tin tài khoản thành công!');
            return redirect()->back();
        }
    }
}
