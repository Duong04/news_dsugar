<?php
namespace App\Services;

use App\Repositories\Role\RoleRepositoryInterface;

class RoleService {
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function getAll() {
        try {
            return $this->roleRepository->all();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 200);
        }
    }

}