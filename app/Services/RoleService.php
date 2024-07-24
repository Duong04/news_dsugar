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
            dd($data);

            $role = Role::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'type' => $data['type'],
            ]);

            $permissionIds = $data['permission_id'];
            $actions = $data['actions'];
            
            $validActions = array_filter($actions, function($action) {
                return !empty(array_filter($action));
            });

            foreach ($validActions as $itemId => $action) {
                $create = isset($action['create']) ? (bool)$action['create'] : false;
                $read = isset($action['read']) ? (bool)$action['read'] : false;
                $update = isset($action['update']) ? (bool)$action['update'] : false;
                $delete = isset($action['delete']) ? (bool)$action['delete'] : false;
                
                $this->rolePermissionRepository->create([
                    'permission_id' => $itemId,
                    'role_id' => $role->id,
                    'read' => $read,
                    'create' => $create,
                    'update' => $update,
                    'delete' => $delete
                ]);
            }

            return true;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

}