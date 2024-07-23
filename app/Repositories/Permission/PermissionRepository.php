<?php 
namespace App\Repositories\Permission;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface {
    public function all() {
        return Permission::all();
    }
    public function find($id) {

    }
    public function create(array $data) {
        return Permission::create($data);
    }
    public function update($id, array $data) {

    }
    public function delete($id) {

    }
}
