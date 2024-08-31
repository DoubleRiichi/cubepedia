<?php

namespace App\Http\Controllers;

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
    public function show($title, $id) {

        $comments = DB::table("comment")
                            ->join("article", $title, "=", "article.title")
                            ->join("user", "comment.user_id", "=", "user.id")
                            ->select("comment.*", "article.id", "article.title", "user.username", "user.avatar", "user.status")->orderByDesc("article.updated_at")->get();

        foreach ($comments as $comment) {
            $comment->post = $this->markdownService->parse($comment->post);
        }


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
        $content = filter_var($request->post, FILTER_SANITIZE_SPECIAL_CHARS);

        Comment::create([
            "post" => $content,
            "user_id" => $user_id,
            "article_id" => $request->article_id
        ]);

        return redirect()->back();
    }
}
