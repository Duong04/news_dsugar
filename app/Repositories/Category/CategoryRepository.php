<?php
namespace App\Repositories\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {
    private $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }
    public function all() {
        return $this->category::all();
    }

    public function find($id){
        return $this->category::findOrFail($id);
    }

    public function getBySlug($slug) {
        return $this->category::with('subcategories')->where('slug', $slug)->first();
    } 

    public function create(array $data){
        return $this->category::create($data);
    }

    public function update($id, array $data) {
        $category = $this->category::findOrFail($id);
        return $category->update($data);
    }
    public function delete($id){
        $category = $this->category::findOrFail($id);
        return $category->delete();
    }
}