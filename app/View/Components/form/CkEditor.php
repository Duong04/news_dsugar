<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CkEditor extends Component
{
    public $name;
    public $label;
    public $error;
    public $value;
    public $class;
    public function __construct($name, $label, $class, $error = null, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->error = $error;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.ck-editor');
    }
}
