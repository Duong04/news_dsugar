<?php 
namespace App\Services;

use App\Repositories\TypeRole\TypeRoleRepositoryInterface;

class TypeRoleService {
    protected $typeRoleRepository;
    public function __construct(TypeRoleRepositoryInterface $typeRoleRepository) {
        $this->typeRoleRepository = $typeRoleRepository;
    }

    public function getAll() {
        try {
            return $this->typeRoleRepository->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}