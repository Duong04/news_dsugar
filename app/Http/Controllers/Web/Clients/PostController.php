<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\Web\Admins\PostRequest;
use App\Traits\FormatTime;

class PostController extends Controller
{
    use FormatTime;
    private $postService;
    private $categoryService;
    public function __construct(PostService $postService, CategoryService $categoryService) {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }
    public function getPostByCategory($slug, Request $request) {
        $listId = [];
        $limit = $request->query('limit', 5);
        $category = $this->categoryService->getBySlug($slug);
        $post = $this->postService->getPostByCategorySlug($slug, 'category');
        $posts = $this->postService->getPostByCategorySlug($slug, 'category', 4, [$post->id]);
        $listId = collect([$post->id])->merge($posts->pluck('id'))->toArray();
        $postPaginates = $this->postService->getPostByCategorySlugPaginate($slug, 'category', $limit, $listId);
        return view('clients.news.news', compact('post', 'posts', 'postPaginates', 'category'));
    }

    public function getPostBySubcategory($categorySlug, $subcategorySlug, Request $request) {
        $listId = [];
        $limit = $request->query('limit', 5);
        $category = $this->categoryService->getBySlug($categorySlug);
        $post = $this->postService->getPostByCategorySlug($subcategorySlug, 'subcategory');
        $posts = $this->postService->getPostByCategorySlug($subcategorySlug, 'subcategory', 4, [$post->id]);
        $listId = collect([$post->id])->merge($posts->pluck('id'))->toArray();
        $postPaginates = $this->postService->getPostByCategorySlugPaginate($subcategorySlug, 'subcategory', $limit, $listId);
        return view('clients.news.news', compact('post', 'posts', 'postPaginates', 'category'));
    }

    public function create() {
        return view('clients.news.create');
    }
    public function store(PostRequest $request) {
        $status = $request->input('action') == 'pending' ? 'pending' : 'draft';
        $postSuccess = $this->postService->create($request, $status);
        if ($postSuccess) {
            if ($status == 'pending') {
                toastr()->success('Đã gửi yêu cầu thành công!');
                return redirect()->back();
            }else {
                toastr()->info('Bài viết của bạn đã được lưu dưới dạng nháp!');
                return redirect()->back();
            }
        }
    }

    public function show($slug) {
        $post = $this->postService->getPostBySlug($slug);
        return view('clients.news.update', compact('post'));
    }
    
    public function postDetail($slug) {
        $formatCommentTime = function ($time) {
            return $this->formatTime($time);
        };
        $post = $this->postService->getPostBySlug($slug);
        $this->postService->postIncrement('view', $post->id);
        return view('clients.news.news-detail', compact('post', 'formatCommentTime'));
    }
}
