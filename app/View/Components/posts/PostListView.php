<?php

namespace App\View\Components\posts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Traits\FormatTime;

class PostListView extends Component
{
    /**
     * Create a new component instance.
     */
    use FormatTime;
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
        $formatTime = function ($time) {
            return $this->formatTime($time);
        };

        return view('components.posts.post-list-view', compact('formatTime'));
    }
}
