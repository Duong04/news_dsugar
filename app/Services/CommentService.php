<?php
namespace App\Services;

use App\Repositories\Comment\CommentRepositoryInterface;
class CommentService {
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    public function getAll() {
        try {
            return $this->commentRepository->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function commentByPostId($postId) {
        try {
            return $this->commentRepository->commentByPostId($postId);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create($request) {
        try {
            $data = $request->validated();
            return $this->commentRepository->create($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}