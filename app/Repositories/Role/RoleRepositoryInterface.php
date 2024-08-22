<?php 
namespace App\Repositories\Role;

interface RoleRepositoryInterface {
    public function all();
    public function find($id);
    public function findNoResource($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}