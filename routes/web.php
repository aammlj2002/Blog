<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;

Route::get("/ping", function () {
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config("services.mailchimp.key"),
        'server' => config("services.mailchimp.server_prefix")
    ]);

    $response = $mailchimp->lists->addListMember("5fe879bd3d", [
        "email_address"=>'kyawlinnaingwin8@gmail.com',
        "status"=>"subscribed",
    ]);
    dd($response);
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
