<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs');
    }
    public function show(Blog $blog)
    {
        return view("blog", [
            "blog"=>$blog,
        ]);
    }
}
