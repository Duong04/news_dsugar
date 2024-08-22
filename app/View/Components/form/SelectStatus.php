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
    public $value;
    public $method;
    public function __construct($name, $class, $error, $value = null, $method = null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->error = $error;
        $this->value = $value;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select-status');
    }
}
