<?php

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs');
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view("blog", [
        "blog"=>$blog,
    ]);
});
