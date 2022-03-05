<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post("/subscribe", function (Newsletter $newsletter) {
    request()->validate([
        "email"=>"required | email",
    ]);
    try {
        $newsletter->subscribe(request()->email);
    } catch (Exception $e) {
        throw ValidationException::withMessages([
            "email"=>"this email could not be added to our newsletter list"
        ]);
    }
    return redirect("/")->with("success", "You are now signed up for our newsletters");
});

Route::middleware("auth")->group(function () {
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::post("/blogs/{blog:slug}/comment", [CommentController::class, "store"]);
});

Route::get('/blogs/{blog:slug}', [BlogController::class, "show"]);
Route::get('/', [BlogController::class, "index"]);

Route::middleware("guest")->group(function () {
    Route::get("/register", [AuthController::class, "register"]);
    Route::post("/register", [AuthController::class, "post_register"]);
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "post_login"]);
});
