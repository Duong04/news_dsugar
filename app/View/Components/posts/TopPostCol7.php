<?php

namespace App\View\Components\posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopPostCol7 extends Component
{
    /**
     * Create a new component instance.
     */
    public $post;
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.top-post-col7');
    }
}
