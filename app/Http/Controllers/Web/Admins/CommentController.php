<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Services\CommentReplyService;

class CommentController extends Controller
{
    private $commentService;
    private $commentReplyService;
    public function __construct(CommentService $commentService, CommentReplyService $commentReplyService) {
        $this->commentService = $commentService;
        $this->commentReplyService = $commentReplyService;
    }

    public function index() {
        $comments = $this->commentService->getAll();
        return view('admins.comments.list', compact('comments'));
    }

    public function delete($id) {
        $commentSuccess = $this->commentService->delete($id);
        if ($commentSuccess) {
            toastr()->success('Xóa bình luận thành công');
            return redirect()->back();
        }
    }

    public function commentReply($commentId) {
        $comments = $this->commentReplyService->getByCommentId($commentId);
        return view('admins.comments.list-detail', compact('comments'));
    }

    public function commentReplyDelete($commentId) {
        $commentSuccess = $this->commentReplyService->delete($commentId);
        if ($commentSuccess) {
            toastr()->success('Xóa bình luận thành công');
            return redirect()->back();
        }
    }
}
