<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\View\Component;

class BlogSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-section', [
            "blogs"=>Blog::latest()->filter(request(["search", "category", "username"]))->paginate(9),
        ]);
    }
}
