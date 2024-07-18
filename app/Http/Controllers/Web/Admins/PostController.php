<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Requests\Web\Admins\PostRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index() {
        $posts = $this->postService->getAll();
        return view('admins.posts.list', ['posts' => $posts]);
    }

    public function create() {
        return view('admins/posts/create');
    }

    public function store(PostRequest $request) {
        $postSuccess = $this->postService->create($request);
        if ($postSuccess) {
            toastr()->success('Thêm bài viết thành công!');
            return redirect()->back();
        }
    }

}
