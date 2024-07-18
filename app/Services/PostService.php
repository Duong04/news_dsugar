<?php
namespace App\Services;

use App\Repositories\Post\PostRepositoryInterface;
use Auth;
use Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostService {
    protected $postInterface;

    public function __construct(PostRepositoryInterface $postInterface) {
        $this->postInterface = $postInterface;
    }

    public function getAll() {
        try {
            return $this->postInterface->all();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }

    public function create($request) {
        try {
            $post = $request->validated();

            $image = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'news_dsugar/posts'
            ]);

            $url = $image->getSecurePath();
            $data = [
                'content' => $post['content'],
                'title' => $post['title'],
                'description' => $post['description'],
                'author_id' => Auth::user()->id,
                'category_id' => $post['category_id'],
                'subcat_id' => $post['subcat_id'],
                'status' => $post['status'],
                'image' => $url,
                'slug' => Str::slug($post['title'], '-'),
            ];

            return $this->postInterface->create($data);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }
}