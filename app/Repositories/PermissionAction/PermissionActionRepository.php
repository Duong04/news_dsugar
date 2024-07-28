<?php
namespace App\Repositories\PermissionAction;

use App\Repositories\PermissionAction\PermissionActionRepositoryInterface;
use App\Models\PermissionAction;
class PermissionActionRepository implements PermissionActionRepositoryInterface {
    public function all() {

    }
    public function find($id) {

    }
    public function create(array $data) {
        return PermissionAction::create($data);
    }
    public function update($id, array $data) {

    }
    public function delete($id) {
        return PermissionAction::where('permission_id', $id)->delete();
    }
}