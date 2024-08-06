<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Http\Requests\Api\CommentRequest;

class CommentController extends Controller
{
    private $commentService;
    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function index() {
        try {
            return response()->json(['data' => $this->commentService->getAll()],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function commentByPostId($postId) {
        try {
            return response()->json(['data' => $this->commentService->commentByPostId($postId)],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function create(CommentRequest $request) {
        try {
            return response()->json([
                        'message' => 'Create comment successfully',
                        'data' => $this->commentService->create($request)
                    ],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }
}
