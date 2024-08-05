<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
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

    public function postDetail($slug) {
        $post = $this->postService->getPostBySlug($slug);
        $this->postService->postIncrement('view', $post->id);
        return view('clients.news.news-detail', compact('post'));
    }
}
