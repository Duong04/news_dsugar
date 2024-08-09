<?php
namespace App\Services;

use App\Repositories\CommentReply\CommentReplyRepositoryInterface;

class CommentReplyService {
    private $commentReplyRepository;
    public function __construct(CommentReplyRepositoryInterface $commentReplyRepository) {
        $this->commentReplyRepository = $commentReplyRepository;
    }

    public function create($request) {
        try {
            $data = $request->validated();
            return $this->commentReplyRepository->create($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id) {
        try {
            return $this->commentReplyRepository->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}