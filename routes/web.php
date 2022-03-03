<?php

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('blogs');
})->middleware("auth");

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view("blog", [
        "blog"=>$blog,
    ]);
})->middleware("auth");
Route::get("/register", function () {
    return view("auth.register");
})->middleware("guest");
Route::post("/register", function () {
    $formData = request()->validate([
        "name"=>"required | min:3 | max:30",
        "username"=>["required", "min:3", "max:30", Rule::unique("users", "username")],
        "email"=>["required", "email", Rule::unique("users", "email")],
        "password"=>"required | min:8 | max:30",
    ]);
    $user = User::create($formData);
    auth()->login($user);
    return redirect("/");
})->middleware("guest");
Route::post("/logout", function () {
    auth()->logout();
    return redirect("/login");
})->middleware("auth");
Route::get("/login", function () {
    return view("auth.login");
})->name("login")->middleware("guest");
Route::post("/login", function () {
    $formData = request()->validate([
        "email"=>["required", "email", Rule::exists("users", "email")],
        "password"=>"required | min:8 | max:30",
    ]);
    if (auth()->attempt($formData)) {
        return redirect("/");
    } else {
        return redirect()->back()->withErrors([
            "password"=>"incorrect password"
        ]);
    }
})->middleware("guest");
