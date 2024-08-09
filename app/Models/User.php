<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $fillable = [
        'user_name',
        'email',
        'password',
        'status',
        'avatar',
        'token',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function permissions()
    {
        return $this->role()->with('permissions')->get()->pluck('permissions')->flatten()->unique('id');
    }

    public function actions()
    {
        return $this->role->actions();
    }

    public function hasPermission($permissionName)
    {
        return $this->permissions()->contains('name', $permissionName);
    }

    public function hasAction($permissionName, $actionName, $role_id)
    {
        $permission = $this->permissions()->where('name', $permissionName)->first();

        if (!$permission) {
            return []; 
        }

        $filteredActions = $permission->actions->filter(function ($action) use ($role_id, $permission) {
            return $action->pivot->role_id == $role_id && $action->pivot->permission_id == $permission->id;
        })->values();

        $permissionNew = [
            'actions' => $filteredActions,
        ];
        
        if ($permissionNew) {
            return $permissionNew['actions']->contains('value', $actionName);
        }
        return false;
    }

}
