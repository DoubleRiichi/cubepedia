<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Image;
use App\Services\MarkdownService;
use Illuminate\Database\Query\Builder;

class HomeController extends Controller
{
    //

    protected $markdownService;

    public function __construct(MarkdownService $markdownService)
    {
        $this->markdownService = $markdownService;
    }

    public function show() {


        $recent_articles = Article::join("image", 'article.id', "=", "image.article_id")
                            ->join("user", "article.user_id", "=", "user.id")
                            ->select("article.*", "image.path", "user.username")->limit(5)->orderByDesc("article.updated_at")->get();

        $recent_comments = Comment::join("article", "comment.article_id", "=", "article.id")
                            ->join("user", "comment.user_id", "=", "user.id")
                            ->select("comment.*", "user.avatar", "user.username", "article.title")->limit(10)->orderByDesc("comment.created_at")->get();


        foreach ($recent_comments as $comment) {
            $comment->post = $this->markdownService->parse($comment->post);
        }
        
        foreach ($recent_articles as $article) {
            $article->intro = $this->markdownService->parse($article->intro);
        }

        return view("index", compact("recent_articles", "recent_comments"));
    }
}
