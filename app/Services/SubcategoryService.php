<?php 
namespace App\Services;

use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use Str;
use App\Services\CloundinaryService;

class SubcategoryService {
    protected $subcategoryInterface;
    protected $cloundinaryService;

    public function __construct(SubcategoryRepositoryInterface $subcategoryInterface, CloundinaryService $cloundinaryService) {
        $this->subcategoryInterface = $subcategoryInterface;
        $this->cloundinaryService = $cloundinaryService;
    }

    public function getAll() {
        try {
            return $this->subcategoryInterface->all();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }

    public function create($request) {
        try {
            $subcategory = $request->validated();

            $image = $request->file('image');
            $folder = 'news_dsugar/subcategories';

            $url = $this->cloundinaryService->upload($image, $folder);
            $subcategory['image'] = $url;
            $subcategory['slug'] = Str::slug($subcategory['name'], '-');

            return $this->subcategoryInterface->create($subcategory);
            
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }

    public function findId($id) {
        try {
            return $this->subcategoryInterface->find($id);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 404);
        }
    }
    public function findCategoryId($categoryId) {
        try {
            return $this->subcategoryInterface->findAll($categoryId);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 404);
        }
    }

    public function update($request, $id) {
        try {
            $subcategory = $request->validated();
            $subcategory['slug'] = Str::slug($subcategory['name'], '-');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $folder = 'news_dsugar/subcategories';

                $url = $this->cloundinaryService->upload($image, $folder);
                $subcategory['image'] = $url;
            }

            return $this->subcategoryInterface->update($id, $subcategory);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }

    public function delete($id) {
        try {
            return $this->subcategoryInterface->delete($id);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 404);
        }
    }
}