<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs', [
        "blogs"=>Blog::latest()->filter(request(["search", "category", "username"]))->paginate(9),
        "categories"=>Category::all()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view("blog", [
        "blog"=>$blog
    ]);
});
