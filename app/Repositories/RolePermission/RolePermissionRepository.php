<?php 
namespace App\Repositories\RolePermission;

use App\Models\RolePermission;
use App\Repositories\RolePermission\RolePermissionRepositoryInterface;
class RolePermissionRepository implements RolePermissionRepositoryInterface {
    public function all() {

    }
    public function find($id) {

    }
    public function create(array $data) {
        return RolePermission::create($data);
    }
    public function update($id, array $data) {

    }
    public function delete($id) {

    }
}