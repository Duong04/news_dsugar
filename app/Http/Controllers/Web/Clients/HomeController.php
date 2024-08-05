<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;

class HomeController extends Controller
{
    private $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }
    public function index() {
        $listId = [];
        $latestPost = $this->postService->getLastPost();
        $latestPosts = $this->postService->getLastPost(4, [$latestPost->id]);
        $listId = collect([$latestPost->id])->merge($latestPosts->pluck('id'))->toArray();
        $mostViewed = $this->postService->getMostViewedPost(4, $listId);
        $listId = collect([$latestPost->id])->merge($latestPosts->pluck('id'))->merge($mostViewed->pluck('id'))->toArray();
        $postRands = $this->postService->getPostRand(5, $listId);
        $post24Coder = $this->postService->getPostByCategory('24h Coder', 'category');
        $post24Coders = $this->postService->getPostByCategory('24h Coder', 'category', 5, [$post24Coder->id]);
        $postTech = $this->postService->getPostByCategory('Công Nghệ', 'category');
        $postTechs = $this->postService->getPostByCategory('Công Nghệ', 'category', 5, [$postTech->id]);
        $postFashion = $this->postService->getPostByCategory('Thời trang', 'category');
        $postFashions = $this->postService->getPostByCategory('Thời trang', 'category', 5, [$postFashion->id]);
        return view('clients.home.home', compact('latestPost', 'latestPosts', 'mostViewed', 'postRands', 'post24Coder', 'post24Coders', 'postTech', 'postTechs', 'postFashion', 'postFashions'));
    }

    public function search(Request $request) {
        return view('clients.home.search');
    }
}
