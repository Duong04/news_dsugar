<?php 
namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Post\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface {
    private $post;
    public function __construct(Post $post) {
        $this->post = $post;
    }
    public function all() {
        return $this->post::with('category', 'subcategory', 'user')->orderByDesc('created_at')->get();
    }
    public function getPostByUserId($userId) {
        return $this->post::with('category', 'subcategory', 'user')->orderByDesc('created_at')->where('author_id', $userId)->get();
    }

    public function getPosts($limit, $q) {
        $posts = $this->post::published()->latest()->with('category', 'subcategory', 'user');
    
        if ($q !== null) {
            $posts->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhereHas('user', function ($qUser) use ($q) {
                          $qUser->where('user_name', 'like', "%{$q}%");
                      })
                      ->orWhereHas('category', function ($qCategory) use ($q) {
                          $qCategory->where('name', 'like', "%{$q}%");
                      })
                      ->orWhereHas('subcategory', function ($qSubcategory) use ($q) {
                          $qSubcategory->where('name', 'like', "%{$q}%");
                      });
            });
        }
    
    
        if ($limit !== null) {
            return $posts->paginate($limit);
        }
    
        return $posts->get();
    }
    public function getLastPost($limit = null, $id = null) {
        $query = $this->post::published()->latest()->with('category', 'subcategory', 'user');
    
        if ($id !== null) {
            $query->whereNotIn('id', $id);
        }
    
        if ($limit !== null) {
            $query->limit($limit);
        }
    
        return $limit !== null ? $query->get() : $query->first();
    }

    public function mostViewedPost($limit = null, $id = null) {
        $query = $this->post::published()->mostViewed()->with('category', 'subcategory', 'user');
        
        if ($id !== null) {
            $query->whereNotIn('id', $id);
        }

        if ($limit !== null) {
            $query->limit($limit);
        }
 
        return $limit != null ? $query->get() : $query->first();
    }

    public function postRand($limit = null, $id = null) {
        $query = $this->post::published()->postRand()->with('category', 'subcategory', 'user');
    
        if ($id !== null) {
            $query->whereNotIn('id', $id);
        }
    
        if ($limit !== null) {
            $query->limit($limit);
        }
    
        return $limit !== null ? $query->get() : $query->first();
    }

    public function postByCategory($categoryName, $table, $limit = null, $id = null) {
        $query = $this->post::published()
        ->with('category', 'subcategory', 'user')
        ->whereHas($table, function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })
        ->orderByDesc('created_at');

        if ($id !== null) {
            $query->whereNotIn('id', $id);
        }

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $limit !== null ? $query->get() : $query->first();
    }

    public function postByCategorySlug($slug, $table, $limit = null, $id = null) {
        $query = $this->post::published()
        ->with('category', 'subcategory', 'user')
        ->whereHas($table, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->orderByDesc('created_at');

        if ($id !== null) {
            $query->whereNotIn('id', $id);
        }

        if ($limit !== null) {
            return $query->limit($limit)->get();
        }

        return $query->first();
    }

    public function postByCategorySlugPaginate($slug, $table, $limit = null, $id = null) {
        $query = $this->post::published()
        ->with('category', 'subcategory', 'user')
        ->whereHas($table, function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->orderByDesc('created_at');

        if ($id !== null) {
            $query->whereNotIn('id', $id);
        }

        if ($limit !== null) {
            return $query->paginate($limit);
        }

        return $query->get();
    }

    public function postBySlug($slug) {
        return $this->post::where('slug', $slug)->first();
    }

    public function postIncrement($col, $id) {
        $post = $this->post->find($id);
        return $post->increment('view');
    }
    public function find($id) {
        return $this->post::with('category', 'subcategory')->findOrFail($id);
    }

    public function create(array $data) {
        return $this->post::create($data);
    }

    public function update($id, array $data) {
        $post = $this->post::findOrFail($id);
        return $post->update($data);
    }

    public function delete($id) {
        $post = $this->post::findOrFail($id);
        return $post->delete();
    }
}