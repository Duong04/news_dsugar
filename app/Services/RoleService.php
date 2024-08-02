<?php
namespace App\Services;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\RolePermission\RolePermissionRepositoryInterface;
use App\Models\Role;
class RoleService {
    protected $roleRepository;
    protected $rolePermissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, RolePermissionRepositoryInterface $rolePermissionRepository) {
        $this->roleRepository = $roleRepository;
        $this->rolePermissionRepository = $rolePermissionRepository;
    }

    public function getAll() {
        try {
            return $this->roleRepository->all();
        } catch (\Throwable $th) {
            return true;
        }
    }

    public function create($request) {
        try {
            $request->validated();
            
            $data = $request->input(); 
            
            $role = Role::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'type_id' => $data['type'],
            ]);
    
            $actions = $data['actions'];
    
            foreach ($actions as $permission_id => $action) {
                foreach ($action as $action_id) {
                    $this->rolePermissionRepository->create([
                        'permission_id' => $permission_id,
                        'role_id' => $role->id,
                        'action_id' => $action_id
                    ]);
                }
            }
    
            return true;
    
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function findById($id) {
        try {
            $role = $this->roleRepository->find($id);

            return $role;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $request->validated();

            $data = $request->input();

            $this->rolePermissionRepository->delete($id);
            $this->roleRepository->update($id, [
                'name' => $data['name'],
                'description' => $data['description'],
                'type_id' => $data['type'],
            ]);

            $actions = $data['actions'];
    
            foreach ($actions as $permission_id => $action) {
                foreach ($action as $action_id) {
                    $this->rolePermissionRepository->create([
                        'permission_id' => $permission_id,
                        'role_id' => $id,
                        'action_id' => $action_id
                    ]);
                }
            }
    
            return true;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
 
}