<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Section;
use App\Models\Image;

class ArticleController extends Controller
{

    function show($title) {
        $article = Article::where("title", "=", $title)->first();
        
        if(!$article) {
            abort(404);
        }

        $sections = Section::where("article_id", "=", $article->id)->get();
        $summary = [];
        $images = [];

        if($sections) {
            $summary = [];
            foreach($sections as $section) {
                array_push($summary, $section->title);
                $images[$section->id] = Image::where("section_id", "=", $section->id)->get();
            }
        }

        return view("wiki.article", compact("article", "sections", "summary", "images"));
    }
}
