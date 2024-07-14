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
    public function __construct($label, $name, $type, $error = null, $id = null, CategoryService $categoryService)
    {
        $this->error = $error;
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->categories = $categoryService->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
