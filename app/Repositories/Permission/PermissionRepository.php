<?php 
namespace App\Repositories\Permission;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface {
    private $permissions;
    public function __construct(Permission $permissions) {
        $this->permissions = $permissions;
    }
    public function all() {
        return $this->permissions::with(['permissionActions'])->get();
    }
    public function find($id) {
        return $this->permissions::with('permissionActions')->findOrFail($id);
    }
    public function create(array $data) {
        return $this->permissions::create($data);
    }
    public function update($id, array $data) {
        $permission = $this->permissions::findOrFail($id);
        return $permission->update($data);
    }
    public function delete($id) {
        $permission = $this->permissions::findOrFail($id);
        return $permission->delete();
    }
}
