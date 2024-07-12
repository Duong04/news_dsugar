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
    public $value;
    public function __construct($name, $label, $type, $error = null, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->error = $error;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input2');
    }
}
