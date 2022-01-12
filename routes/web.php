<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs', [
        "blogs"=>Blog::latest()->filter(request(["search", "category", "username"]))->get()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view("blog", [
        "blog"=>$blog
    ]);
});
