<?php 

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;

class AuthService {
    protected $userInterface;

    public function __construct(UserRepositoryInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function create($request) {
        try {
            $user = $request->validated();
            return response()->json($request->validated(), 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 200);
        }
    }
}