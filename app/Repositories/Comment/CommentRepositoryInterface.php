<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface {
    public function all();
    public function find($id);
    public function commentByPostId($postId);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}