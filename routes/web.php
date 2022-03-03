<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs');
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view("blog", [
        "blog"=>$blog,
    ]);
});
Route::get("/register", function () {
    return view("auth.register");
});
