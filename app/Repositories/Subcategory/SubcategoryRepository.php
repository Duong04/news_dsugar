<?php
namespace App\Repositories\Subcategory;

use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Models\Subcategory;

class SubcategoryRepository implements SubcategoryRepositoryInterface {
    public function all() {
        return Subcategory::with('categories')->get();
    }
    public function find($id) {

    }
    public function create(array $data) {
        return Subcategory::create($data);
    }
    public function update($id, array $data) {

    }
    public function delete($id) {

    }
}