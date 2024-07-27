<?php 
namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Post\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface {
    public function all() {
        return Post::with('category', 'subcategory', 'user')->get();
    }
    public function find($id) {
        return Post::with('category', 'subcategory')->findOrFail($id);
    }
    public function create(array $data) {
        return Post::create($data);
    }
    public function update($id, array $data) {
        $post = Post::findOrFail($id);
        return $post->update($data);
    }
    public function delete($id) {
        $post = Post::findOrFail($id);
        return $post->delete();
    }
}