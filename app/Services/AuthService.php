<?php 

namespace App\Services;

use App\Mail\EmailVerification;
use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Hash;
use Str;

class AuthService {
    protected $userInterface;

    public function __construct(UserRepositoryInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function create($request) {
        try {
            $validate = $request->validated();
            $user = User::create([
                'user_name' => $validate['user_name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate['password']),
                'status' => 'inactive',
                'avatar' => 'https://duong04.s3.ap-southeast-2.amazonaws.com/public/images/avatar/default-image.png',
                'role_id' => 10,
                'token' => Str::random(40)
            ]);

            Mail::to($user['email'])->send(new EmailVerification($user['token']));
            return response()->json('Create Account Successfully!', 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 422);
        }
    }
}