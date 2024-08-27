<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ArticleController;

Route::get("/wiki/{title}", [ArticleController::class, "show"]);


Route::get("/home", function() {
    return view("index");
});