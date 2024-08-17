<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;
use Auth;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index(Request $request) {
        $limit = $request->query('limit', null);
        $q = $request->query('q', null);
        $posts = $this->postService->getPosts($limit, $q);
        return response()->json([
            'data' => $posts->items(),
            'total' => $posts->total(),
            'next_page' => $posts->nextPageUrl(),
            'prev_page' => $posts->previousPageUrl()
        ], 200);
    }

    public function topPostView(Request $request) {
        $data = $this->postService->topPostView($request);
        return response()->json(['data' => $data], 200);
    }

    public function topCategoriesByPostView(Request $request) {
        $data = $this->postService->topCategoriesByPostViews($request);
        return response()->json(['data' => $data], 200);
    }

    public function topSubcategoriesByPostView(Request $request) {
        $data = $this->postService->topSubcategoriesByPostViews($request);
        return response()->json(['data' => $data], 200);
    }
}
