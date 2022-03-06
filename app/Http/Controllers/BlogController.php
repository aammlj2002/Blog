<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
    }
    public function show(Blog $blog)
    {
        return view("blog.show", [
            "blog"=>$blog,
        ]);
    }
}
