<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input2 extends Component
{
    public $name;
    public $label;
    public $type;
    public $error;
    public function __construct($name, $label, $type, $error = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input2');
    }
}
