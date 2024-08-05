<?php

namespace App\View\Components\layoutsClient;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\PostService;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService->getLastPost(4);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts-client.aside');
    }
}
