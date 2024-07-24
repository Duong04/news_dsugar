<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActionService;
use App\Http\Requests\Web\Admins\ActionRequest;

class ActionController extends Controller
{
    protected $actionService;

    public function __construct(ActionService $actionService) {
        $this->actionService = $actionService;
    }
    public function index() {
        $actions = $this->actionService->getAll();

        return view('admins.actions.list', ['actions' => $actions]);
    }

    public function store(ActionRequest $request) {
        $actionSuccess = $this->actionService->create($request);

        if ($actionSuccess) {
            toastr()->success('Tạo action thành công!');
            return redirect()->back();
        }
    }

    public function update(ActionRequest $request, $id) {
        $actionSuccess = $this->actionService->update($request, $id);

        if ($actionSuccess) {
            toastr()->success('Cập nhật action thành công!');
            return redirect()->back();
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
