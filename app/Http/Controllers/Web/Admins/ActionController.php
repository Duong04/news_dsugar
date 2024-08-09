<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Services\ActionService;
use App\Http\Requests\Web\Admins\ActionRequest;

class ActionController extends Controller
{
    private $actionService;
    private $permissionService;

    public function __construct(ActionService $actionService, PermissionService $permissionService) {
        $this->actionService = $actionService;
        $this->permissionService = $permissionService;
    }

    public function index() {
        $actions = $this->actionService->getAll();

        return view('admins.actions.list', ['actions' => $actions]);
    }

    public function create() {
        $permissions = $this->permissionService->getAll();
        return view('admins.actions.create', ['permissions' => $permissions]);
    }

    public function store(ActionRequest $request) {
        $actionSuccess = $this->actionService->create($request);

        if ($actionSuccess) {
            toastr()->success('Tạo action thành công!');
            return redirect()->back();
        }
    }

    public function show($id) {
        $permissions = $this->permissionService->getAll();
        $action = $this->actionService->findById($id);
        return view('admins.actions.update', ['action' => $action, 'permissions' => $permissions]);
    }

    public function update(ActionRequest $request, $id) {
        $actionSuccess = $this->actionService->update($request, $id);

        if ($actionSuccess) {
            toastr()->success('Cập nhật action thành công!');
            return redirect()->route('actions');
        }
    }

    public function delete($id) {
        $actionSuccess = $this->actionService->delete($id);

        if ($actionSuccess) {
            toastr()->success('Xóa action thành công!');
            return redirect()->back();
        }
    }
}
