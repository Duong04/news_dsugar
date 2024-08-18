<?php 
namespace App\Repositories\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use App\Repositories\Post\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface {
    private $post;
    private $category;
    private $subcategory;
    public function __construct(Post $post, Category $category, Subcategory $subcategory) {
        $this->post = $post;
        $this->category = $category;
        $this->subcategory = $subcategory;
    }
    public function all() {
        return $this->post::with('category', 'subcategory', 'user')->orderByDesc('created_at')->get();
    }
    public function getPostByUserId($userId) {
        return $this->post::with('category', 'subcategory', 'user')->orderByDesc('created_at')->where('author_id', $userId)->get();
    }

    public function getPendingPost() {
        return $this->post::pending()->get();
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

    public function countPost($status, $author_id, $col = null) {
        return $this->post::where('status', $status)->where('author_id', $author_id)->count($col);
    }

    public function topPostView($limit, $author_id) {
        $posts = $this->post::query();
        
        if ($author_id) {
            $posts->where('author_id', $author_id);
        }

        $posts->orderByDesc('view');

        if ($limit) {
            $posts->limit($limit);
        }

        return $posts->get(['title', 'view']);
    }

    public function topCategoriesByPostViews($limit, $author_id = null) {
        $posts = $this->category::select('categories.*')
        ->join('posts', 'categories.id', '=', 'posts.category_id');
        
        if ($author_id) {
            $posts->where('author_id', $author_id);
        }
        
        $posts->selectRaw('SUM(posts.view) as total_views')
        ->groupBy('categories.id')
        ->orderBy('total_views', 'desc');

        if ($limit) {
            $posts->limit($limit);
        }
        return $posts->get();
    }

    public function topSubcategoriesByPostViews($limit, $author_id) {
        $posts = $this->subcategory::select('subcategories.*')
        ->join('posts', 'subcategories.id', '=', 'posts.subcat_id');

        if ($author_id) {
            $posts->where('author_id', $author_id);
        }

        $posts->selectRaw('SUM(posts.view) as total_views')
        ->groupBy('subcategories.id')
        ->orderBy('total_views', 'desc');

        if ($limit) {
            $posts->limit($limit);
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
        return $this->post::with('category', 'subcategory', 'user')->findOrFail($id);
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