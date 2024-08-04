<?php
namespace App\Services;

use App\Repositories\Action\ActionRepositoryInterface;
use App\Repositories\PermissionAction\PermissionActionRepositoryInterface;


class ActionService {
    protected $actionRepository;
    private $permissionActionRepository;

    public function __construct(ActionRepositoryInterface $actionRepository, PermissionActionRepositoryInterface $permissionActionRepository) {
        $this->actionRepository = $actionRepository;
        $this->permissionActionRepository = $permissionActionRepository;
    }

    public function getAll() {
        try {
            return $this->actionRepository->all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function findById($id) {
        try {
            return $this->actionRepository->find($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function create($request) {
        try {
            $request->validated();

            $action = $this->actionRepository->create([
                'name' => $request->input('name'),
                'value' => $request->input('value')
            ]);

            foreach ($request->input('permissions') as $item) {
                $this->permissionActionRepository->create([
                    'action_id' => $action->id,
                    'permission_id' => $item
                ]);
            }

            return $action;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update($request, $id) {
        try {
            $request->validated();

            $this->permissionActionRepository->delete('action_id', $id);

            $action = $this->actionRepository->update($id, ['name' => $request->input('name'), 'value' => $request->input('value')]);

            foreach ($request->input('permissions') as $item) {
                $this->permissionActionRepository->create([
                    'action_id' => $id,
                    'permission_id' => $item
                ]);
            }

            return $action;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function delete($id) {
        try {
            return $this->actionRepository->delete($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}