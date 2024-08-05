<?php

namespace App\View\Components\layoutsClient;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\CategoryService;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    public function __construct(CategoryService $categoryService)
    {
        $this->categories = $categoryService->getAll();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts-client.header');
    }
}
