<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\UserService;

class DashBoardController extends Controller
{
    private $postService;
    private $userService;
    public function __construct(PostService $postService, UserService $userService) {
        $this->postService = $postService;
        $this->userService = $userService;
    }
    public function index() {
        $postCount = $this->postService->countPost(null, null, 'status', 'draft');
        $publishedPostCount = $this->postService->countPost('published', null, 'status');
        $archivedPostCount = $this->postService->countPost('archived', null, 'status');
        $pendingPostCount = $this->postService->countPost('pending', null, 'status');
        $rejectedPostCount = $this->postService->countPost('rejected', null, 'status');

        $userCount = $this->userService->countUser('id');
        $activeUserCount = $this->userService->countUser('status', 'active');
        $inactiveUserCount = $this->userService->countUser('status', 'inactive');
        $disabledUserCount = $this->userService->countUser('status', 'disabled');
        return view('admins.dashboard.dashboard', compact('postCount', 'publishedPostCount', 'archivedPostCount', 'pendingPostCount', 'rejectedPostCount', 'userCount', 'activeUserCount', 'inactiveUserCount', 'disabledUserCount'));
    }
}
