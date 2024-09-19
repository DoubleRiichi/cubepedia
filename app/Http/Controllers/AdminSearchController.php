<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\ModerationHistory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    
    private function userSearch(Request $request) {
        $parameters = [];

        if($request->username) {
            array_push($parameters, ["user.username", "LIKE", "%$request->username%"]);
        }

        if($request->dateBefore) {
            array_push($parameters, ["user.created_at", ">", $request->dateBefore]);
        }

        if($request->dateAfter) {
            array_push($parameters, ["user.created_at", "<", $request->dateAfter]);
        }

        if(in_array($request->status, ["user", "editor", "banned", "admin"])) {
            array_push($parameters, ["user.status", "=", $request->status]);
        }


        return User::where($parameters)->get();
    } 

    private function logSearch(Request $request) {
        $parameters = [];

        if($request->dateOn) {
            array_push($parameters, ["moderation_history.created_at", "=", $request->dateOn]); // might not work because datetime
        }

        if($request->dateBefore) {
            array_push($parameters, ["moderation_history.created_at", ">", $request->dateBefore]);
        }

        if($request->dateAfter) {
            array_push($parameters, ["moderation_history.created_at", "<", $request->dateAfter]);
        }

        if(in_array($request->action, ["ban", "unban", "lock", "unlock", "revert"])) {
            array_push($parameters, ["moderation_history.action", "=", $request->action]);
        }
        
        return ModerationHistory::where($parameters)->get();
    } 

    private function commentSearch(Request $request) {
        $parameters = [];

        if($request->comment) {
            array_push($parameters, ["comment.post", "LIKE", "%$request->comment%"]);
        }

        if($request->dateOn) {
            array_push($parameters, ["comment.created_at", "=", $request->dateOn]); // might not work because datetime
        }

        if($request->dateBefore) {
            array_push($parameters, ["comment.created_at", ">", $request->dateBefore]);
        }

        if($request->dateAfter) {
            array_push($parameters, ["comment.created_at", "<", $request->dateAfter]);
        }

        // return Comment::where($parameters)->get();
        return Comment::join("article", "comment.article_id", "=", "article.id")
        ->join("user", "comment.user_id", "=", "user.id")
        ->select("comment.*", "user.avatar", "user.username", "article.title")->where($parameters)->orderByDesc("comment.created_at")->get();
    } 

    private function articleSearch(Request $request) {
        $parameters = [];

        if($request->title) {
            array_push($parameters, ["article.title", "LIKE", "%$request->title%"]);
        }

        if($request->dateOn) {
            array_push($parameters, ["article.created_at", "=", $request->dateOn]); // might not work because datetime
        }

        if($request->dateBefore) {
            array_push($parameters, ["article.created_at", ">", $request->dateBefore]);
        }

        if($request->dateAfter) {
            array_push($parameters, ["article.created_at", "<", $request->dateAfter]);
        }
        
        return Article::join("image", 'article.id', "=", "image.article_id")
        ->join("user", "article.user_id", "=", "user.id")
        ->select("article.*", "image.path", "user.username")->where($parameters)->orderByDesc("article.updated_at")->get();
    } 


    public function show() {
        
        $kind = null;
        return view("admin.adminsearch", compact("kind"));
    }

    public function search(Request $request) {

        if(!$request->kind || $request->kind == "none") {
            return redirect()->back();
        }

        switch ($request->kind) {
            case 'user':
                $results = $this->userSearch($request);
                break;
            case 'moderation_history':
                $results = $this->logSearch($request);
                break;
            case 'comment':
                $results = $this->commentSearch($request);
                break;
            case 'article':
                $results = $this->articleSearch($request);
                break;
            default:
                return redirect()->back();
        }

        $kind = $request->kind;

        return view("admin.adminsearch", compact("kind", "results"));
    }
}
