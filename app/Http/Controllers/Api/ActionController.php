<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActionService;

class ActionController extends Controller
{
    protected $actionService;

    public function __construct(ActionService $actionService) {
        $this->actionService = $actionService;
    }

    public function getById($id) {
        $action = $this->actionService->findById($id);
        return response()->json($action, 200);
    }
}
