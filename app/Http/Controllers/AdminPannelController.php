<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPannelController extends Controller
{
    function show() {
        
        if(!Auth::check() || !Auth::user()->status = "admin") {
            return redirect()->back()->withErrors("You must be logged in as admin to access this content.");
        }

        $users = DB::table("user")->orderBy("username")->get();

        $comments = DB::table("comment")
        ->join("article", "comment.article_id", "=", "article.id")
        ->join("user", "comment.user_id", "=", "user.id")
        ->select("comment.*", "user.avatar", "user.username", "article.title")->orderByDesc("comment.created_at")->get();

        $articles = DB::table("article")
        ->join("image", 'article.id', "=", "image.article_id")
        ->join("user", "article.user_id", "=", "user.id")
        ->select("article.*", "image.path", "user.username")->orderByDesc("article.updated_at")->get();


        $moderation_history = DB::table("moderation_history")->orderBy("created_at")->get();


        return view("/admin/pannel", compact("users", "comments", "articles", "moderation_history"));
    }
}
