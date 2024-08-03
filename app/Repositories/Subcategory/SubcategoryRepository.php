<?php
namespace App\Repositories\Subcategory;

use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Models\Subcategory;

class SubcategoryRepository implements SubcategoryRepositoryInterface {
    private $subcategory;
    public function __construct(Subcategory $subcategory) {
        $this->subcategory = $subcategory;
    }
    public function all() {
        return $this->subcategory::with('category')->get();
    }
    public function find($id) {
        return $this->subcategory::findOrFail($id);
    }
    public function findAll($id) {
        return $this->subcategory::where('category_id', $id)->get();
    }
    public function create(array $data) {
        return $this->subcategory::create($data);
    }
    public function update($id, array $data) {
        $subcategory = $this->subcategory::findOrFail($id);
        return $subcategory->update($data);
    }
    public function delete($id) {
        $subcategory = $this->subcategory::findOrFail($id);
        return $subcategory->delete();
    }
}