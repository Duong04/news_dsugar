<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectStatus extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $class;
    public $error;
    public function __construct($name, $class, $error)
    {
        $this->name = $name;
        $this->class = $class;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-status');
    }
}
