<?php
namespace App\Services;

use App\Repositories\Action\ActionRepositoryInterface;

class ActionService {
    protected $actionRepository;

    public function __construct(ActionRepositoryInterface $actionRepository) {
        $this->actionRepository = $actionRepository;
    }

    public function getAll() {
        try {
            return $this->actionRepository->all();
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function findById($id) {
        try {
            return $this->actionRepository->find($id);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function create($request) {
        try {
            $request->validated();

            return $this->actionRepository->create([
                'name' => $request->input('name'),
                'value' => $request->input('value')
            ]);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function update($request, $id) {
        try {
            $request->validated();

            return $this->actionRepository->update($id, ['name' => $request->input('name')]);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete($id) {
        try {
            return $this->actionRepository->delete($id);
        } catch (\Throwable $th) {
            return false;
        }
    }
}