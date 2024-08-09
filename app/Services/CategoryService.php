<?php 
namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use Str;
use App\Services\CloundinaryService;

class CategoryService {
    protected $categoryInterface;
    protected $cloundinaryService;

    public function __construct(CategoryRepositoryInterface $categoryInterface, CloundinaryService $cloundinaryService) {
        $this->categoryInterface = $categoryInterface;
        $this->cloundinaryService = $cloundinaryService;
    }  

    public function getAll() {
        return $this->categoryInterface->all();
    }

    public function create($request) {
        try {
            $category = $request->validated();

            $image = $request->file('image');
            $folder = 'news_dsugar/categories';
            $url = $this->cloundinaryService->upload($image, $folder);
            $category['image'] = $url;
            $category['slug'] = Str::slug($category['name'], '-');

            return $this->categoryInterface->create($category);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getBySlug($slug) {
        try {
            return $this->categoryInterface->getBySlug($slug);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function findId($id) {
        try {
            return $this->categoryInterface->find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $category = $request->validated();

            $category['slug'] = Str::slug($category['name'], '-');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'news_dsugar/categories';

                $url = $this->cloundinaryService->upload($image, $folder);
                $category['image'] = $url;
            }

            return $this->categoryInterface->update($id, $category);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }   
    }

    public function delete($id) {
        try {
            return $this->categoryInterface->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}