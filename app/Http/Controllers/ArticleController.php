<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Section;
use App\Models\Image;
use App\Models\ModerationHistory;
use App\Services\MarkdownService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    protected $markdownService;

    public function __construct(MarkdownService $markdownService)
    {
        $this->markdownService = $markdownService;
    }

    public function show($title) {


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


    public function new() {
        if(!Auth::check() || Auth::user()->status == "user") {
            return abort(403);
        }

        return view("wiki.new");
    }


    public function write(Request $request) {

        if(Auth::check() && (Auth::user()->status == "editor" || Auth::user()->status == "admin")) {

            $article_array = [
                "title" => $request->article_title,
                "intro" => $request->intro,
                "image" => $request->article_image,

            ];

            $validator = Validator::make($article_array, [
                'title'  => "required|string|max:255|min:2|unique:article",
                'intro'  => 'required|string|min:5',
                'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $new_article = Article::create([
                "title" => htmlspecialchars($request->article_title),
                "intro" => htmlspecialchars($request->intro),
                "locked" => false,
                "user_id" => Auth::user()->id,
                "editor_id" => Auth::user()->id,
            ]);

            $section_count = (int) $request->sections_count; 

            if($request->hasFile("article_image")) {
                $path = $request->file("article_image")->store($request->article_title, "public"); 
                            
                $new_image = Image::create([
                    "path" => $path,
                    "description" => " ",
                    "article_id" => $new_article->id,
                ]);
            }

            for($counter = 1; $counter <= $section_count; $counter++) {
                $section_title = $request->input("section_title_$counter");
                $section_text = $request->input("section_text_$counter");

                $validator_array = [
                    "title" => $section_title,
                    "text" => $section_text,
                ];

                $validator = Validator::make($validator_array, [
                    'title'  => 'required|string|max:255|min:3',
                    'text'    => 'required|string|min:5',
                    'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    
                ], [
                    "title.required" => "Section $counter, title required",
                    "text.required" => "Section $counter, text required"
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $new_section = Section::create([
                    "title" => htmlspecialchars($section_title),
                    "content" => htmlspecialchars($section_text),
                    "article_id" => $new_article->id,
                ]);

                if($request->hasAny("image_count_$counter") && (int) $request->input("image_count_$counter") > 0) {
                  
                    for($image_counter = 1; $image_counter <= (int) $request->input("image_count_$counter") + 1; $image_counter++) {
                        $input_id = "image_$counter" . "_$image_counter";

                        if($request->hasFile($input_id)) {
                            

                            $path = $request->file($input_id)->store($request->article_title, "public"); 

                            $new_image = Image::create([
                                "path" => $path,
                                "description" => "",
                                "section_id" => $new_section->id,
                            ]);
                        }
                    }
                }
            }            
            
        }

        return redirect("/wiki/$request->article_title");

    }



    public function delete( Request $request) {
            
                if(Auth::check() && Auth::user()->status == "admin") {
        
                    $article = Article::find($request->id);
                    
                    if($article) {
        
                        $article->delete();
                        $reason = htmlspecialchars($request->comment);
        
                        ModerationHistory::create([
                            "action" => "delete",
                            "comment" => "Admin deleted Article $article->id.\n $reason",
                            "user_id" => Auth::id()
                        ]);
                    }
            
            }

            return redirect("/");
        }
    
    }

