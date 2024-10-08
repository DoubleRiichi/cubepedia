<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\ModerationHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPannelController extends Controller
{
    public function show() {
        
        if(!Auth::check() || !Auth::user()->status = "admin") {
            return redirect()->back()->withErrors("You must be logged in as admin to access this content.");
        }

        $users = User::orderBy("username")->get();

        $comments = Comment::join("article", "comment.article_id", "=", "article.id")
        ->join("user", "comment.user_id", "=", "user.id")
        ->select("comment.*", "user.avatar", "user.username", "article.title")->orderByDesc("comment.created_at")->get();

        $articles = Article::join("image", 'article.id', "=", "image.article_id")
        ->join("user", "article.user_id", "=", "user.id")
        ->select("article.*", "image.path", "user.username")->orderByDesc("article.updated_at")->get();


        $moderation_history = ModerationHistory::orderBy("created_at")->get();

        
        foreach ($comments as $comment) {
            $comment->post = $this->markdownService->parse($comment->post);
        }
        
        foreach ($articles as $article) {
            $article->intro = $this->markdownService->parse($article->intro);
        }

        return view("/admin/pannel", compact("users", "comments", "articles", "moderation_history"));
    }
}
