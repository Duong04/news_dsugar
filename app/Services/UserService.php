<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use Auth;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Cookie;

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
            'role.permissions.actions'
        ]);
        return new UserResource($user);
    }

    public function updateStatus($request, $id) {
        try {
            $data = $request->validate([
                'status' => 'required|string',
            ]);

            return $this->userRepository->update($id, $data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create($request) {
        try {
            $data = $request->validated();
            $data['password'] = env('PASSWORD');
            return $this->userRepository->create($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateRole($request, $id) {
        try {
            $data = $request->validate([
                'role_id' => 'required',
            ]);

            return $this->userRepository->update($id, $data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function countUsersInLast12Months($request) {
        try {
            $year = $request->query('year', null);
            return $this->userRepository->countUsersInLast12Months($year);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }    

    public function countUser($col = null, $status = null) {
        try {
            return $this->userRepository->countUser($col, $status);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function findById($id) {
        try {
            return $this->userRepository->find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}