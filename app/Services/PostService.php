<?php
namespace App\Services;

use App\Repositories\Post\PostRepositoryInterface;
use Auth;
use Notification;
use Str;
use App\Services\CloundinaryService;

class PostService {
    protected $postInterface;
    protected $cloundinaryService;

    public function __construct(PostRepositoryInterface $postInterface, CloundinaryService $cloundinaryService) {
        $this->postInterface = $postInterface;
        $this->cloundinaryService = $cloundinaryService;
    }

    public function getAll() {
        try {
            return $this->postInterface->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPosts($limit, $q) {
        try {
            return $this->postInterface->getPosts($limit, $q);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getLastPost($limit = null, $id = null) {
        try {
            return $this->postInterface->getLastPost($limit, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getMostViewedPost($limit = null, $id = null) {
        try {
            return $this->postInterface->mostViewedPost($limit, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPostRand($limit = null, $id = null) {
        try {
            return $this->postInterface->postRand($limit, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPostByCategory($categoryName, $table, $limit = null, $id = null) {
        try {
            return $this->postInterface->postByCategory($categoryName, $table, $limit, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPostBySlug($slug) {
        try {
            return $this->postInterface->postBySlug($slug);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPostByCategorySlug($slug, $table, $limit = null, $id = null) {
        try {
            return $this->postInterface->postByCategorySlug($slug, $table, $limit, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPostByCategorySlugPaginate($slug, $table, $limit = null, $id = null) {
        try {
            return $this->postInterface->postByCategorySlugPaginate($slug, $table, $limit, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create($request, $status = null) {
        try {
            $post = $request->validated();

            $image = $request->file('image');
            $folder = 'news_dsugar/posts';
            
            if ($status) {
                $post['status'] = $status;
            }

            $url = $this->cloundinaryService->upload($image, $folder);

            $post['author_id'] = Auth::user()->id;
            $post['slug'] = Str::slug($post['title'], '-');
            $post['image'] = $url;

            return $this->postInterface->create($post);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPostByUserId($userId) {
        try {
            return $this->postInterface->getPostByUserId($userId);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function findById($id) {
        try {
            return $this->postInterface->find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $request->validated();
            $postData = $request->input();
            $type = $request->query('type', null);

            if (isset($type) && $type == 'approve') {
                $postData['reviewed_at'] = now();
            }

            if (isset($postData['title'])) {
                $postData['slug'] = Str::slug($postData['title'], '-');
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'news_dsugar/posts';

                $url = $this->cloundinaryService->upload($image, $folder);
                $postData['image'] = $url;
            }


            return $this->postInterface->update($id, $postData);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function postIncrement($col, $id) {
        try {
            return $this->postInterface->postIncrement($col, $id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id) {
        try {
            return $this->postInterface->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function countPost($status = null, $author_id = null, $col = null, $notStatus = null) {
        try {
            return $this->postInterface->countPost($status, $author_id, $col, $notStatus);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function topPostView($request) {
        try {
            $limit = $request->query('limit', null);
            $author_id = $request->query('author_id', null);
            return $this->postInterface->topPostView($limit, $author_id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getPedingPost() {
        try {
            return $this->postInterface->getPendingPost();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function topSubcategoriesByPostViews($request) {
        try {
            $limit = $request->query('limit', null);
            $author_id = $request->query('author_id', null);
            return $this->postInterface->topSubcategoriesByPostViews($limit, $author_id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function topCategoriesByPostViews($request) {
        try {
            $limit = $request->query('limit', null);
            $author_id = $request->query('author_id', null);
            return $this->postInterface->topCategoriesByPostViews($limit, $author_id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}