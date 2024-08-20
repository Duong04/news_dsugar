<?php 
namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use App\Http\Resources\UserResource;
use Carbon\Carbon;

class UserRepository implements UserRepositoryInterface {
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }
    public function all() {
        $users = $this->user::with('role.permissions.actions')->get();

        return UserResource::collection($users);
    }

    public function pagination() {
        return $this->user::paginate();
    }

    public function create(array $data) {
        return $this->user::create($data);
    }

    public function find($id) {
        return $this->user::with('role')->find($id);
    }

    public function update($id, array $data) {
        $user = $this->user::find($id);
        return $user->update($data);
    }

    public function countUser($col, $value) {
        $user = $this->user->query();
        if ($value) {
            $user->where($col, $value);
        }

        return $user->count($col);
    }

    public function countUsersInLast12Months($year = null) {
        if ($year === null) {
            $year = Carbon::now()->year;
        }
    
        $results = User::selectRaw('COUNT(*) as count, MONTH(created_at) as month, YEAR(created_at) as year, status')
            ->whereYear('created_at', $year) 
            ->groupBy('year', 'month', 'status')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->get();
    
        $finalData = [];
        foreach ($results as $item) {
            $yearMonthKey = $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
            if (!isset($finalData[$yearMonthKey])) {
                $finalData[$yearMonthKey] = [
                    'year' => $item->year,
                    'month' => $item->month,
                    'active' => 0,
                    'inactive' => 0,
                    'pending' => 0
                ];
            }
            
            $finalData[$yearMonthKey][$item->status] = $item->count;
        }
    
        for ($i = 1; $i <= 12; $i++) {
            $yearMonthKey = $year . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
            if (!isset($finalData[$yearMonthKey])) {
                $finalData[$yearMonthKey] = [
                    'year' => $year,
                    'month' => $i,
                    'active' => 0,
                    'inactive' => 0,
                    'pending' => 0
                ];
            }
        }
    
        ksort($finalData);
    
        return $finalData;
    }

    public function updateToken($token, array $data) {
        $user = $this->user::where('token', $token)->first();
        if (!$user) {
            return false; 
        }
        $user->fill($data); 
        $user->save();
        return $user;
    }

    public function delete($id) {

    }
}