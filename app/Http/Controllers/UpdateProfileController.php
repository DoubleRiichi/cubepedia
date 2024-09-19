<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Egulias\EmailValidator\Result\ValidEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{


    public function show($username) {

        

        $user = User::where("username", "=", $username)->first(); 

        if(!$user) {
            return redirect(null, 404);
        }

        if(Auth::check() && (Auth::user()->id == $user->id || Auth::user()->status == "admin")) {


  
            return view("users.update", compact("user"));
        } else {
            redirect()->back();
        }
    }


    public function update(Request $request) {

        if(Auth::check() && (Auth::user()->id == $request->user_id || Auth::user()->status == "admin")) {
        

            $validator = Validator::make($request->all(), [
                "username" => 'required|string|min:4|max:32',
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::find($request->user_id);
            $user->username = $request->username;

            if($request->hasFile("avatar")) {

                $validator = Validator::make($request->all(), [
                    "avatar" => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);


                if($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $path = $request->file("avatar")->store("avatars", "public");
                $user->avatar = $path; 
            }

            $user->save();

            return redirect("/profile/$user->username");
        } else {
            return redirect()->back();
        }
    }
}
