<?php
namespace App\Repositories\CommentReply;

use App\Repositories\CommentReply\CommentReplyRepositoryInterface;
use App\Models\CommentReply;

class CommentReplyRepository implements CommentReplyRepositoryInterface {
    private $commentReply;
    public function __construct(CommentReply $commentReply) {
        $this->commentReply = $commentReply;
    }
    public function all() {
        return $this->commentReply::all();
    }
    public function find($id) {
        return $this->commentReply::find($id);
    }
    public function create(array $data) {
        return $this->commentReply::create($data);
    }
    public function update($id, array $data) {
        $commentReply = $this->commentReply::find($id);
        return $commentReply->update($data);
    }
    public function delete($id) {
        $commentReply = $this->commentReply::find($id);
        return $commentReply->delete();
    }
}