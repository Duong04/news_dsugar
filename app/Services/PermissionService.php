<?php 
namespace App\Services;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\PermissionAction\PermissionActionRepository;
use App\Repositories\PermissionAction\PermissionActionRepositoryInterface;

class PermissionService {
    protected $permissionRepository;
    protected $permissionActionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository, PermissionActionRepositoryInterface $permissionActionRepository) {
        $this->permissionRepository = $permissionRepository;
        $this->permissionActionRepository = $permissionActionRepository;
    }

    public function getAll() {
        try {
            return $this->permissionRepository->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create($request) {
        try {
            $request->validated();
            $data = $request->input();

            $permission = $this->permissionRepository->create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);

            foreach ($data['actions'] as $item) {
                $this->permissionActionRepository->create([
                    'action_id' => $item,
                    'permission_id' => $permission->id
                ]);
            }

            return $permission;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function findById($id) {
        try {
            return $this->permissionRepository->find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $request->validated();
            $data = $request->input();

            $this->permissionActionRepository->delete($id);
            $permisson = $this->permissionRepository->update($id, [
                'name' => $data['name'],
                'description' => $data['description'],
            ]);

            foreach ($data['actions'] as $item) {
                $this->permissionActionRepository->create([
                    'action_id' => $item,
                    'permission_id' => $id
                ]);
            }

            return $permisson;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id) {
        try {
            return $this->permissionRepository->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}