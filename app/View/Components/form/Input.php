<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $icon;
    public $label;
    public $type;
    public $error;
    public function __construct($name, $icon, $label, $type, $error = null)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->label = $label;
        $this->type = $type;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
