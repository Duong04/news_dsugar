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

    public function findById($id) {
        try {
            return $this->typeRoleRepository->find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create($request) {
        try {
            $data = $request->validated();

            return $this->typeRoleRepository->create($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $data = $request->validated();
            return $this->typeRoleRepository->update($id, $data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    public function delete($id) {
        try {
            return $this->typeRoleRepository->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}