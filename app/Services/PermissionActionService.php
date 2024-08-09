<?php
namespace App\Services;

use App\Repositories\PermissionAction\PermissionActionRepositoryInterface;

class PermissionActionService {
    protected $permissionActionRepository;
    public function __construct(PermissionActionRepositoryInterface $permissionActionRepository) {
        $this->permissionActionRepository = $permissionActionRepository;
    }

    public function create() {
        
    }
}