<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use Auth;
use App\Repositories\User\UserRepositoryInterface;
class UserService {
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function getAll() {
        try {
            return $this->userRepository->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function getUser() {
        $user = Auth::user()->load([
            'role.permissions.actions' => function ($query) {
                $query->distinct();
            }
        ]);
        return new UserResource($user);
    }

    public function updateStatus($request, $id) {
        try {
            $request->validate([
                'status' => 'required|string',
            ]);

            return $this->userRepository->update($id, [
                'status' => $request->input('status')
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateRole($request, $id) {
        try {
            $request->validate([
                'role_id' => 'required',
            ]);

            return $this->userRepository->update($id, [
                'role_id' => $request->input('role_id')
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}