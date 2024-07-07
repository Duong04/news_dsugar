<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Services\AuthService;
use App\Http\Requests\Web\Clients\RegisterRequest;
use PhpParser\Node\Stmt\TryCatch;

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
}
