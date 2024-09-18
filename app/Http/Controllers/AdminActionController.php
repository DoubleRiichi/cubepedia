<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\EditHistory;
use App\Models\ModerationHistory;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminActionController extends Controller
{

    //["ban", "unban", "lock", "unlock", "delete", "revert"])
    private static function is_admin()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->status == "admin") {
                return true;
            }
        }

        return false;
    }

    public function ban(Request $request) {

        if(AdminActionController::is_admin()) {        

            $target_user = User::find($request->id);
            $user = User::find(Auth::id());

            if($target_user) {
                $target_user->status = "banned";
                $target_user->save();

                Auth::setUser($target_user);
                Auth::logout();
                Auth::login($user);

                ModerationHistory::create([
                    "action" => "ban",
                    "comment" => "Admin banned $target_user->username.\n\n $request->comment",
                    "user_id" => Auth::id(),
                ]);
            }

        }
        return redirect()->back();
    }


    public function unban(Request $request) {
        // ADD ADMIN CHECK
        if(AdminActionController::is_admin()) {        

            $target_user = User::find($request->id);

            if($target_user) {
                $target_user->status = "user";
                $target_user->save();

                ModerationHistory::create([
                    "action" => "unban",
                    "comment" => "Admin unbanned $target_user->username.\n\n $request->comment",
                    "user_id" => Auth::id(),
                ]);
            }
        }

        return redirect()->back();
    }


    public function lock(Request $request) {
        if(AdminActionController::is_admin()) {

            $article = Article::find($request->id);
            
            if($article) {
                $article->locked = true;
                $article->save();   
                $comment = htmlspecialchars($request->comment);

                ModerationHistory::create([
                    "action" => "lock",
                    "comment" => "Admin locked article $article->title.\n $comment",
                    "user_id" => Auth::id(),
                ]);
            }
        }

        return redirect()->back();

    }

    public function unlock(Request $request) {
        if(AdminActionController::is_admin()) {

            $article = Article::find($request->id);
            
            if($article) {
                $article->locked = true;
                $article->save();
                $comment = htmlspecialchars($request->comment);

                ModerationHistory::create([
                    "action" => "unlock",
                    "comment" => "Admin unlocked article $article->title.\n $comment",
                    "user_id" => Auth::id(),
                ]);
            }
        }
        return redirect()->back();

    }

    public function delete(Request $request) {
        if(AdminActionController::is_admin()) {

            $comment = Comment::find($request->id);
            
            if($comment) {

                $comment->delete();
                $reason = htmlspecialchars($request->comment);

                ModerationHistory::create([
                    "action" => "delete",
                    "comment" => "Admin deleted article  $comment->id.\n $reason",
                    "user_id" => Auth::id()
                ]);
            }
        }

        return redirect()->back();
    }

    public function revert(Request $request) {
        if(AdminActionController::is_admin()) {

            $section = Section::find($request->id);
            $old_section = EditHistory::find($request->version_id);

            if($section && $old_section) {
                $old_text = $section->content;
                $section->content = $old_section->new_text;
                $section->save;

                EditHistory::create([
                   "old_text"   => $old_text,
                   "new_text"   => $old_section->new_text,
                   "article_id" => $section->article_id,
                   "user_id" => Auth::id()
                ]);


                $reason = htmlspecialchars($request->comment);

                ModerationHistory::create([
                    "action"  => "revert",
                    "comment" => "Admin restored $section->title.\n $reason",
                    "user_id" => Auth::id(),
                ]);
            }
        }

        return redirect()->back();
    }
}
