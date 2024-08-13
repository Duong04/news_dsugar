<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;
use Auth;

class ProfileController extends Controller
{
    private $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }
    public function account() {
        $userId = Auth::user()->id;
        $posts = $this->postService->getPostByUserId($userId);
        return view('clients.profile.profile', compact('posts'));
    }
}
