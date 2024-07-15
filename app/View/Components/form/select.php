<?php

namespace App\View\Components\form;

use App\Services\CategoryService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     */
    public $error;
    public $label;
    public $name;
    public $type;
    public $categories;
    public $id;
    public $class;
    public $classChild;
    public function __construct($label, $name, $type, $class, $classChild, $error = null, $id = null, CategoryService $categoryService)
    {
        $this->error = $error;
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->classChild = $classChild;
        $this->categories = $type == 'categories' ? $categoryService->getAll() : null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
