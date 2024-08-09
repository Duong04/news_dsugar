<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TypeRoleService;

class TypeController extends Controller
{
    private $typeRoleService;
    public function __construct(TypeRoleService $typeRoleService) {
        $this->typeRoleService = $typeRoleService;
    }

    public function getById($id) {
        $type = $this->typeRoleService->findById($id);
        return response()->json($type, 200);
    }
}
