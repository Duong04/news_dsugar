<?php

namespace App\Http\Controllers\Web;

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
        $loginSuccess = $this->authService->login($request);
        if ($loginSuccess) {
            toastr()->success('Đăng nhập thành công');
            return redirect()->intended('/');
        } 

        toastr()->error('Thông tin xác thực được cung cấp không khớp với hồ sơ của chúng tôi.');
        return redirect()->back()->withInput();
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
            toastr()->info('Đẫ đăng xuất thành công!');
            return redirect()->route('login');
        }
    }
}
