<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class checkbox extends Component
{
    public $name;
    public $value;
    public $label;
    public $id;
    public $className;
    public $checked;
    public function __construct($name, $value, $label, $id, $className, $checked = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->id = $id;
        $this->className = $className;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
