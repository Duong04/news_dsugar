<?php 
namespace App\Repositories\Role;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Http\Resources\RoleResource;

class RoleRepository implements RoleRepositoryInterface {
    public function all() {
        return Role::all();
    }
    public function find($id) {
        $role = Role::with(['permissions.actions'])->findOrFail($id);

        return new RoleResource($role);
    }
    public function create(array $data) {
        return Role::create($data);
    }
    public function update($id, array $data) {
        $role = Role::findOrFail($id);
        return $role->update($data);
    }
    public function delete($id) {
        
    }
}