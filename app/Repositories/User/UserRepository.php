<?php 
namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function all() {
        return User::all();
    }

    public function pagination() {
        return User::paginate();
    }

    public function create(array $data) {
        return User::create($data);
    }

    public function find($id) {
        return User::find($id);
    }

    public function update($id, array $data) {
        $user = User::find($id);
        return $user->update($data);
    }

    public function updateToken($token, array $data) {
        $user = User::where('token', $token)->first();
        if (!$user) {
            return false; 
        }
        $user->fill($data); 
        $user->save();
        return $user;
    }

    public function delete($id) {

    }
}