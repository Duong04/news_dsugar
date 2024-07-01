<?php

namespace App\View\Components\social;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Social extends Component
{
    /**
     * Create a new component instance.
     */
    public $justifyContent;
    public function __construct($justifyContent)
    {
        $this->justifyContent = $justifyContent;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.social.social');
    }
}
