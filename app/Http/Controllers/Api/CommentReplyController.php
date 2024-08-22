<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommentReplyService;
use App\Http\Requests\Api\CommentReplyRequest;

class CommentReplyController extends Controller
{
    private $commentReplyService;
    public function __construct(CommentReplyService $commentReplyService) {
        $this->commentReplyService = $commentReplyService;
    }

    public function create(CommentReplyRequest $request) {
        try {
            return response()->json([
                        'message' => 'Create comment successfully',
                        'data' => $this->commentReplyService->create($request)
                    ],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }

    public function delete($id) {
        try {
            $this->commentReplyService->delete($id);
            return response()->json(['message' => 'Delete comment reply successfully'], 203);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }
}
