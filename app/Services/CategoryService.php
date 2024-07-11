<?php 
namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService {
    protected $categoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryInterface) {
        $this->categoryInterface = $categoryInterface;
    }

    public function getAll() {
        return $this->categoryInterface->all();
    }
}