<?php

namespace App\View\Components\posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopPostCol5 extends Component
{
    /**
     * Create a new component instance.
     */
    public $posts;
    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.top-post-col5');
    }
}
