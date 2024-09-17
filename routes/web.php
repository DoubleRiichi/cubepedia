<?php

use App\Http\Controllers\AdminActionController;
use App\Http\Controllers\AdminPannelController;
use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\UserProfileController;
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


Route::get("/wiki/{id}/discussion", [DiscussionController::class, "show"]);
Route::post("/wiki/discussion/post",   [DiscussionController::class, "post"]);
Route::get("/wiki/discussion/delete/{id}", [DiscussionController::class, "delete"]);
Route::post("/wiki/discussion/update", [DiscussionController::class, "update"]);


Route::get("/admin/panel", [AdminPannelController::class, "show"]);
Route::post("/admin/ban", [AdminActionController::class, "ban"]);
Route::post("/admin/unban", [AdminActionController::class, "unban"]);
Route::post("/admin/lock", [AdminActionController::class, "lock"]);
Route::post("/admin/unlock", [AdminActionController::class, "unlock"]);

Route::get("/search", [AdminSearchController::class, "show"]);
Route::post("/search", [AdminSearchController::class, "search"]);

Route::get("/profile/{username}", [UserProfileController::class, "show"]);  