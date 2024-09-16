<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Section;
use App\Models\Image;
use App\Services\MarkdownService;

class ArticleController extends Controller
{

    protected $markdownService;

    public function __construct(MarkdownService $markdownService)
    {
        $this->markdownService = $markdownService;
    }

    function show($title) {
        $article = Article::where("title", "=", $title)->first();
        
        if(!$article) {
            abort(404);
        }
        $article->intro = $this->markdownService->parse($article->intro);
        $article_image = Image::where("article_id", "=", $article->id)->first();

        $sections = Section::where("article_id", "=", $article->id)->get();
        $summary = [];
        $images = [];

        if($sections) {
            $summary = [];
            foreach($sections as $section) {
                array_push($summary, $section->title);
                $images[$section->id] = Image::where("section_id", "=", $section->id)->get();
                $section->content = $this->markdownService->parse($section->content);
            }
        }

        return view("wiki.article", compact("article", "article_image", "sections", "summary", "images"));
    }
}
