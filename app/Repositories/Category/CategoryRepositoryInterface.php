<?php 
namespace App\Repositories\Category;

interface CategoryRepositoryInterface {
    public function all();
    public function find($id);
    public function getBySlug($slug);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}