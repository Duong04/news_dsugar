<?php 
namespace App\Repositories\TypeRole;

use App\Repositories\TypeRole\TypeRoleRepositoryInterface;
use App\Models\TypeRole;

class TypeRoleRepository implements TypeRoleRepositoryInterface {
    public function all() {
        return TypeRole::all();
    }

    public function find($id) {

    }

    public function findAll($id) {

    }

    public function create(array $data) {
        return TypeRole::create($data);
    }

    public function update($id, array $data) {

    }
    
    public function delete($id) {
        $type = TypeRole::findOrFail($id);
        return $type->delete();
    }
} 