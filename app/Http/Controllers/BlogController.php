<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view("blog.create");
    }
}
