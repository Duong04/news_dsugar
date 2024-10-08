<?php
namespace App\Repositories\Comment;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface {
    private $comment;
    public function __construct(Comment $comment) {
        $this->comment = $comment;
    }
    public function all() {
        return $this->comment::with('user', 'post')->get();
    }
    public function commentByPostId($postId) {
        return $this->comment::with('user', 'commentReplys.user')->where('post_id', $postId)->get();
    }
    public function commentByAuthorId($authorId) {
        return $this->comment::with('user', 'post')
        ->whereHas('post', function ($query) use ($authorId) {
            $query->where('author_id', $authorId);
        })
        ->get();
    }
    public function find($id) {
        return $this->comment::find($id);
    }
    public function create(array $data) {
        return $this->comment::create($data);
    }
    public function update($id, array $data) {
        $comment = $this->comment::find($id);
        return $comment->update($data);
    }
    public function delete($id) {
        $comment = $this->comment::find($id);
        return $comment->delete();
    }
}