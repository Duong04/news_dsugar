<?php 
namespace App\Services;

use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use Str;

class SubcategoryService {
    protected $subcategoryInterface;

    public function __construct(SubcategoryRepositoryInterface $subcategoryInterface) {
        $this->subcategoryInterface = $subcategoryInterface;
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

            return $this->subcategoryInterface->create([
                'name' => $subcategory['name'],
                'description' => $subcategory['description'],
                'category_id' => $subcategory['category_id'],
                'slug' => Str::slug($subcategory['name'], '-')
            ]);
            
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
            $data = [
                'name' => $subcategory['name'],
                'description' => $subcategory['description'],
                'category_id' => $subcategory['category_id'],
                'slug' => Str::slug($subcategory['name'], '-')
            ];

            return $this->subcategoryInterface->update($id, $data);
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