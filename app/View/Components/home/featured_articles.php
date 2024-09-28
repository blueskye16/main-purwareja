<?php

namespace App\View\Components\home;

use Closure;
use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class featured_articles extends Component
{
    /**
     * Create a new component instance.
     */

    public $posts;

    public function __construct(Post $posts)
    {
        // $posts = Post::all();
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.tester_apk');
    }
}
