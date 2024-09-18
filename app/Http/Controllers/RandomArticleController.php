<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RandomArticleController extends Controller
{

    public function show() {

        while(true) {
            $latest = DB::table("article")->select("id")->limit(1)->orderByDesc("id")->first();
            $value = rand(1, $latest->id);
            $article = DB::table("article")->find($value);

            if($article->id) {
                break;
            }
            
        }
         
        return redirect("/wiki/$article->title");
    }
}
