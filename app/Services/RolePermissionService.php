<?php 
namespace App\Services;

use App\Repositories\RolePermission\RolePermissionRepositoryInterface;
class RolePermissionService {
    protected $rolePermissionRepository;
    public function __construct(RolePermissionRepositoryInterface $rolePermissionRepository) {
        $this->rolePermissionRepository = $rolePermissionRepository;
    }

}