<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\MarkdownService;
use Illuminate\Support\Facades\DB;

class DiscussionController extends Controller
{

    protected $markdownService;

    public function __construct(MarkdownService $markdownService)
    {
        $this->markdownService = $markdownService;
    }

    public function show($id) {

        $comments = Comment::join("article", "comment.article_id", "=", "article.id")
                            ->join("user", "comment.user_id", "=", "user.id")
                            ->where("comment.article_id", "=", $id)
                            ->select("comment.*", "article.title", "user.username", "user.avatar", "user.status")->orderByDesc("comment.updated_at")->get();

        foreach ($comments as $comment) {
            $comment->post = $this->markdownService->parse($comment->post);
        }

        $title = Article::find($id)->title;

        return view("wiki.discussion", compact("comments", "title", "id"));
    }

    public function post(Request $request) {

        if(!Auth::check()) {
            return redirect()->back()->withErrors("You cannot write a comment without being logged in.");
        }

        $validator = Validator::make($request->all(), [
            'post' => "required|string|max:4000"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::id();
        $content = htmlspecialchars($request->post);

        Comment::create([
            "post" => $content,
            "user_id" => $user_id,
            "article_id" => $request->id
        ]);

        return redirect()->back();
    }

    public function delete($id) {

        if(!Auth::check()) {
            return redirect()->back()->withErrors("You cannot delete a comment without being logged in.");
        }

        $comment = Comment::find($id);

        if($comment->user_id == Auth::id() || Auth::user()->status == "admin") {
            $comment->delete();
        }

        return redirect()->back();
    }

    public function update(Request $request) {
        
        if(!Auth::check()) {
            return redirect()->back()->withErrors("You cannot update a comment without being logged in.");
        }

        $comment = Comment::find($request->id);
        

        if($comment->id == Auth::id() || Auth::user()->status == "admin") {
            $comment->post = htmlspecialchars($request->post);
            $comment->save();
        }
        
        return redirect()->back();
    }
}
