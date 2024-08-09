<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\TypeRoleService;

class SelectType extends Component
{
    public $name;
    public $class;
    public $error;
    public $value;
    public $typeRole;
    public function __construct($name, $class, $error, $value = null, TypeRoleService $typeRoleService)
    {
        $this->name = $name;
        $this->class = $class;
        $this->error = $error;
        $this->value = $value;
        $this->typeRole = $typeRoleService->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-type');
    }
}
