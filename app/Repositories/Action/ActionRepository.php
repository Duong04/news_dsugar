<?php 
namespace App\Repositories\Action;

use App\Repositories\Action\ActionRepositoryInterface;
use App\Models\Action;

class ActionRepository implements ActionRepositoryInterface {
    private $action;
    public function __construct(Action $action) {
        $this->action = $action;
    }
    public function all() {
        return $this->action::all();
    }
    public function find($id) {
        return $this->action::findOrFail($id);
    }
    public function create(array $data) {
        return $this->action::create($data);
    }
    public function update($id, array $data) {
        $action = $this->action::findOrFail($id);
        return $action->update($data);
    }
    public function delete($id) {
        $action = $this->action::findOrFail($id);
        return $action->delete();
    }
}