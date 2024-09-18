<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Egulias\EmailValidator\Result\ValidEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{


    public function show($username) {

        $user = User::where("username", "=", $username)->first(); 

        if(!$user) {
            return redirect(null, 404);
        }

  
        
        $user_articles = Article::where("article.user_id", "=", $user->id)
        ->join("image", 'article.id', "=", "image.article_id")
        ->join("user", "article.user_id", "=", "user.id")
        ->select("article.*", "image.path", "user.username")->orderByDesc("article.updated_at")->get();

        $user_comments = Comment::where("comment.user_id", "=", $user->id)
        ->join("article", "comment.article_id", "=", "article.id")
        ->join("user", "comment.user_id", "=", "user.id")
        ->select("comment.*", "user.avatar", "user.username", "article.title")->orderByDesc("comment.created_at")->get();

        foreach ($user_comments as $comment) {
            $comment->post = $this->markdownService->parse($comment->post);
        }
        
        foreach ($user_articles as $article) {
            $article->intro = $this->markdownService->parse($article->intro);
        }

        return view("users.profile", compact("user", "user_articles", "user_comments"));
    }

}
