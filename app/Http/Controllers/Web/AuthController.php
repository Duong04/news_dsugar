<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\Web\Clients\RegisterRequest;
use Auth;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }
    public function showRegister() {
        return view('clients/auth/register');
    }

    public function actionRegister(RegisterRequest $request) {
        return $this->authService->create($request);
    }

    public function showLogin() {
        return view('clients/auth/login');
    }

    public function verifyEmail($token) {
        $user = $this->authService->verifyEmail($token);
        if ($user) {
            return redirect()->route('login');
        }
    }
}
