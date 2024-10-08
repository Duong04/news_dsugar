<?php
namespace App\Repositories\User;

interface UserRepositoryInterface {
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function countUser($col, $value);
    public function countUsersInLast12Months($year = null);
    public function updateToken($token, array $data);
    public function delete($id);
}