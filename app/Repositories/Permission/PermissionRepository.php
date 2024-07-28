<?php 
namespace App\Repositories\Permission;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface {
    public function all() {
        return Permission::with('permissionActions')->get();
    }
    public function find($id) {
        return Permission::with('permissionActions')->findOrFail($id);
    }
    public function create(array $data) {
        return Permission::create($data);
    }
    public function update($id, array $data) {
        $permission = Permission::findOrFail($id);
        return $permission->update($data);
    }
    public function delete($id) {
        $permission = Permission::findOrFail($id);
        return $permission->delete();
    }
}
