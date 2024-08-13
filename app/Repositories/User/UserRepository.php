<?php 
namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserRepository implements UserRepositoryInterface {
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }
    public function all() {
        $users = $this->user::with('role.permissions.actions')->get();

        return UserResource::collection($users);
    }

    public function pagination() {
        return $this->user::paginate();
    }

    public function create(array $data) {
        return $this->user::create($data);
    }

    public function find($id) {
        return $this->user::with('role')->find($id);
    }

    public function update($id, array $data) {
        $user = $this->user::find($id);
        return $user->update($data);
    }

    public function updateToken($token, array $data) {
        $user = $this->user::where('token', $token)->first();
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