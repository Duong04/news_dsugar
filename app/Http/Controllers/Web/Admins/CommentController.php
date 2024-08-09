<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;
    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
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
}
