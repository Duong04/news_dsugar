<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\RoleService;

class SelectRole extends Component
{
    /**
     * Create a new component instance.
     */
    public $class;
    public $name;
    public $error;
    public $label;
    public $roles;
    public $id;
    public function __construct($class, $name, $error, $label, RoleService $roleService, $id = null)
    {
        $this->roles = $roleService->getAll();
        $this->class = $class;
        $this->name = $name;
        $this->label = $label;
        $this->error = $error;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-role');
    }
}
