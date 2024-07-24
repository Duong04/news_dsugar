<?php 
namespace App\Repositories\Action;

use App\Repositories\Action\ActionRepositoryInterface;
use App\Models\Action;

class ActionRepository implements ActionRepositoryInterface {
    public function all() {
        return Action::all();
    }
    public function find($id) {
        return Action::findOrFail($id);
    }
    public function create(array $data) {
        return Action::create($data);
    }
    public function update($id, array $data) {
        $action = Action::findOrFail($id);
        return $action->update($data);
    }
    public function delete($id) {
        $action = Action::findOrFail($id);
        return $action->delete();
    }
}