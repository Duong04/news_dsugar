<?php
namespace App\Services;

use App\Repositories\Post\PostRepositoryInterface;
use Auth;
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

    public function create($request) {
        try {
            $post = $request->validated();

            $image = $request->file('image');
            $folder = 'news_dsugar/posts';

            $url = $this->cloundinaryService->upload($image, $folder);

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
            $data = $request->input();
            $postData = [
                'content' => $data['content'],
                'title' => $data['title'],
                'description' => $data['description'],
                'author_id' => Auth::user()->id,
                'category_id' => $data['category_id'],
                'subcat_id' => $data['subcat_id'],
                'status' => $data['status'],
                'slug' => Str::slug($data['title'], '-'),
            ];

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

    public function delete($id) {
        try {
            return $this->postInterface->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}