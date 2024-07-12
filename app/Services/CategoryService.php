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

    public function findId($id) {
        try {
            return $this->categoryInterface->find($id);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 404);
        }
    }

    public function update($request, $id) {
        try {
            $category = $request->validated();
            $data = [
                'name' =>$category['name'],
                'description' =>$category['description'],
                'slug' => Str::slug($category['name'], '-'),
            ];

            return $this->categoryInterface->update($id, $data);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }   
    }

    public function delete($id) {
        try {
            return $this->categoryInterface->delete($id);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 422);
        }
    }
}