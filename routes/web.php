<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get('/', [BlogController::class, "index"]);
    Route::get('/blogs/{blog:slug}', [BlogController::class, "show"]);
    Route::post("/logout", [AuthController::class, "logout"]);
});


Route::middleware("guest")->group(function () {
    Route::get("/register", [AuthController::class, "register"]);
    Route::post("/register", [AuthController::class, "post_register"]);
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "post_login"]);
});
