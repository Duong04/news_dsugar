<?php 
namespace App\Repositories\TypeRole;

use App\Repositories\TypeRole\TypeRoleRepositoryInterface;
use App\Models\TypeRole;

class TypeRoleRepository implements TypeRoleRepositoryInterface {
    private $typeRole;
    public function __construct(TypeRole $typeRole) {
        $this->typeRole = $typeRole;
    }
    public function all() {
        return $this->typeRole::all();
    }

    public function find($id) {
        return $this->typeRole::findOrFail($id);
    }

    public function create(array $data) {
        return $this->typeRole::create($data);
    }

    public function update($id, array $data) {
        $type = $this->typeRole::findOrFail($id);
        return $type->update($data);
    }
    
    public function delete($id) {
        $type = TypeRole::findOrFail($id);
        return $type->delete();
    }
} 