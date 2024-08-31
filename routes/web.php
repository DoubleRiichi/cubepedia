<?php

use App\Http\Controllers\DiscussionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RandomArticleController;

Route::get("/wiki/{title}", [ArticleController::class, "show"]);
Route::get("/random", [RandomArticleController::class, "show"]);
Route::get("/", [HomeController::class, "show"]);


Route::get("/auth/login",  [LoginController::class, "show"]);
Route::post("/auth/login", [LoginController::class, "login"]);
Route::get("/auth/logout", [LoginController::class, "logout"]);

Route::get("/auth/register",  [RegisterController::class, "show"]);
Route::post("/auth/register", [RegisterController::class, "register"]);


Route::get("/wiki/{title}/{id}/discussion/", [DiscussionController::class, "show"]);
Route::post("/wiki/discussion/post",   [DiscussionController::class, "post"]);
