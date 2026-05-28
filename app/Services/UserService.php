<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use Auth;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Cookie;
use App\Services\CloundinaryService;

class UserService {
    private $userRepository;
    private $cloundinaryService;
    public function __construct(UserRepositoryInterface $userRepository, CloundinaryService $cloundinaryService) {
        $this->userRepository = $userRepository;
        $this->cloundinaryService = $cloundinaryService;
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

    public function updateProdile($request) {
        try {
            $request->validated();
            $data = [];
            $user = auth()->user();

            if ($request->has('email') && $request->input('email')) {
                $data['email'] = $request->input('email');
            }
            if ($request->has('user_name') && $request->input('user_name')) {
                $data['user_name'] = $request->input('user_name');
            }
            if ($request->has('first_name') && $request->input('first_name')) {
                $data['first_name'] = $request->input('first_name');
            }
            if ($request->has('last_name') && $request->input('last_name')) {
                $data['last_name'] = $request->input('last_name');
            }
            if ($request->has('address') && $request->input('address')) {
                $data['address'] = $request->input('address');
            }
            if ($request->has('phone') && $request->input('phone')) {
                $data['phone'] = $request->input('phone');
            }
            
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $folder = 'news_dsugar/avatars';
                $url = $this->cloundinaryService->upload($file, $folder);
                $data['avatar'] = $url;
            }

            return $user->update($data);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}