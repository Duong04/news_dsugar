<?php
namespace App\Repositories\Subcategory;

use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Models\Subcategory;

class SubcategoryRepository implements SubcategoryRepositoryInterface {
    public function all() {
        return Subcategory::with('categories')->get();
    }
    public function find($id) {
        return Subcategory::findOrFail($id);
    }
    public function findAll($id) {
        return Subcategory::where('category_id', $id)->get();
    }
    public function create(array $data) {
        return Subcategory::create($data);
    }
    public function update($id, array $data) {
        $subcategory = Subcategory::findOrFail($id);
        return $subcategory->update($data);
    }
    public function delete($id) {
        $subcategory = Subcategory::findOrFail($id);
        return $subcategory->delete();
    }
}