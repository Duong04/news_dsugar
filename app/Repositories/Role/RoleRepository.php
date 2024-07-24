<?php 
namespace App\Repositories\Role;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface {
    public function all() {
        return Role::all();
    }
    public function find($id) {
        
    }
    public function create(array $data) {
        return Role::create($data);
    }
    public function update($id, array $data) {
        
    }
    public function delete($id) {
        
    }
}