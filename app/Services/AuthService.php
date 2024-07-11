<?php 

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Hash;
use Str;
use App\Jobs\ProcessMail;
use Auth;

class AuthService {
    protected $userInterface;

    public function __construct(UserRepositoryInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function create($request) {
        try {
            $validate = $request->validated();
            $user = $this->userInterface->create([
                'user_name' => $validate['user_name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate['password']),
                'status' => 'inactive',
                'avatar' => 'https://duong04.s3.ap-southeast-2.amazonaws.com/public/images/avatar/default-image.png',
                'role_id' => 10,
                'token' => Str::random(40)
            ]);

            dispatch(new ProcessMail($user['email'], $user['token']));
            return true;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 422);
        }
    }

    public function verifyEmail($token) {
        try {
            $user = $this->userInterface->updateToken($token, ['token' => 0, 'status' => 'active']);
            if ($user) {
                return $user;
            }

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 422);
        }
    }

    public function login($request) {
        $user = $request->validated();

        if (Auth::attempt($user)) {
            $request->session()->regenerate();
 
            return true;
        }

        return false;
    }

    public function logout($request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return true;
    }
}