<?php
namespace App\Services;

use App\Repositories\Post\PostRepositoryInterface;

class PostService {
    protected $postInterface;

    public function __construct(PostRepositoryInterface $postInterface) {
        $this->postInterface = $postInterface;
    }
}