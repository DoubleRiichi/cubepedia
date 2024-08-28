<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Exception;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:16|unique:user',
            'email'    => 'required|string|email|max:120|unique:user',
            'password' => 'required|string|min:8|max:32|confirmed',
            'avatar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $path = "";

        if($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store("avatars", "public");
        }

        $user = User::create([
            'username' => $request->username,
            'avatar'   => $path,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => "user",
        ]);

        
        // auth()->login($user);

        return redirect('/');
    }

}
