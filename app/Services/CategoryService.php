<?php 
namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use Str;

class CategoryService {
    protected $categoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryInterface) {
        $this->categoryInterface = $categoryInterface;
    }

    public function getAll() {
        return $this->categoryInterface->all();
    }

    public function create($request) {
        try {
            $category = $request->validated();

            $okok = $this->categoryInterface->create([
                'name' => $category['name'],
                'description' => $category['description'],
                'slug' => Str::slug($category['name'], '-')
            ]);

            return true;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
        
    }
}