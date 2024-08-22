<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectStatusUser extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $class;
    public $error;
    public $value;
    public function __construct($name, $class, $error, $value = null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->error = $error;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-status-user');
    }
}
