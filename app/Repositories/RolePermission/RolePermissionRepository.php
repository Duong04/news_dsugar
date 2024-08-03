<?php 
namespace App\Repositories\RolePermission;

use App\Models\RolePermission;
use App\Models\Role;
use App\Repositories\RolePermission\RolePermissionRepositoryInterface;
class RolePermissionRepository implements RolePermissionRepositoryInterface {
    private $rolePermission;
    public function __construct(RolePermission $rolePermission) {
        $this->rolePermission = $rolePermission;
    }
    public function all() {

    }
    public function find($id) {

    }
    public function create(array $data) {
        return $this->rolePermission::create($data);
    }
    public function update($id, array $data) {

    }
    public function delete($id) {
        return $this->rolePermission::where('role_id', $id)->delete();
    }
}