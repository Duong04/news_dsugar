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
}