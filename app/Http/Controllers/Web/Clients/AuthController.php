<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\Web\Clients\RegisterRequest;
use App\Http\Requests\Web\Clients\LoginRequest;
use Illuminate\Http\Request;
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
        $registerSuccess = $this->authService->create($request);
        if ($registerSuccess) {
            toastr()->success('Đăng ký tài khoản thành công!');
            return redirect()->route('checkmail');
        }
    }

    public function showLogin() {
        return view('clients/auth/login');
    }

    public function actionLogin(LoginRequest $request) {
        return $this->authService->login($request);
    }

    public function verifyEmail($token) {
        $user = $this->authService->verifyEmail($token);
        if ($user) {
            toastr()->success('Đã kích hoạt tài khoản thành công!');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request) {
        $logoutSuccess = $this->authService->logout($request);
        if ($logoutSuccess) {
            toastr()->info('Đã đăng xuất thành công!');
            return redirect()->route('login');
        }
    }
}
