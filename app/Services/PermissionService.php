<?php 
namespace App\Services;

use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionService {
    protected $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository) {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAll() {
        try {
            return $this->permissionRepository->all();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function create($request) {
        try {
            $permission = $request->validated();
            
            return $this->permissionRepository->create([
                'name' => $permission['name'],
                'description' => $permission['description'],
            ]);

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function findById($id) {
        try {
            return $this->permissionRepository->find($id);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function update($request, $id) {
        try {
            $request->validated();
            $data = $request->input();

            return $this->permissionRepository->update($id, [
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete($id) {
        try {
            return $this->permissionRepository->delete($id);
        } catch (\Throwable $th) {
            return false;
        }
    }
}