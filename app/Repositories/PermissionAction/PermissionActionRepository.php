<?php
namespace App\Repositories\PermissionAction;

use App\Repositories\PermissionAction\PermissionActionRepositoryInterface;
use App\Models\PermissionAction;
class PermissionActionRepository implements PermissionActionRepositoryInterface {
    private $permissionAction;
    public function __construct(PermissionAction $permissionAction) {
        $this->permissionAction = $permissionAction;
    }
    public function all() {

    }
    public function find($id) {

    }
    public function create(array $data) {
        return $this->permissionAction::create($data);
    }
    public function update($id, array $data) {

    }
    public function delete($col, $id) {
        return $this->permissionAction::where($col, $id)->delete();
    }
}