<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::post("/blogs/{blog:slug}/comment", [CommentController::class, "store"]);
    Route::middleware("admin")->group(function () {
        Route::get("/admin", [AdminBlogController::class, "index"]);
        Route::get("/admin/blogs/create", [AdminBlogController::class, "create"]);
        Route::post("/admin/blogs/create", [AdminBlogController::class, "store"]);
        Route::get("/admin/blogs/{blog:slug}/edit", [AdminBlogController::class, "edit"]);
        Route::post("/admin/blogs/{blog:slug}/edit", [AdminBlogController::class, "update"]);
    });
});

Route::get('/blogs/{blog:slug}', [BlogController::class, "show"]);
Route::get('/', [BlogController::class, "index"]);
Route::post("/subscribe", NewsletterController::class);

Route::middleware("guest")->group(function () {
    Route::get("/register", [AuthController::class, "register"]);
    Route::post("/register", [AuthController::class, "post_register"]);
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "post_login"]);
});
