<?php 
namespace App\Repositories\Role;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Models\Role;
use App\Http\Resources\RoleResource;

class RoleRepository implements RoleRepositoryInterface {
    private $role;
    public function __construct(Role $role) {
        $this->role = $role;
    }
    public function all() {
        return $this->role::withCount('users')->with('users')->get();
    }
    public function find($id) {
        $role = $this->role::with('permissions.actions')->findOrFail($id);
        
        return new RoleResource($role);
    }
    public function findNoResource($id) {
        $role = $this->role::withCount('users')->findOrFail($id);
        
        return $role;
    }
    public function create(array $data) {
        return $this->role::create($data);
    }
    public function update($id, array $data) {
        $role = $this->role::findOrFail($id);
        return $role->update($data);
    }
    public function delete($id) {
        $role = $this->role::find($id);
        return $role->delete();
    }
}