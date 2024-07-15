<?php 
namespace App\Repositories\Subcategory;

interface SubcategoryRepositoryInterface {
    public function all();
    public function find($id);
    public function findAll($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
} 