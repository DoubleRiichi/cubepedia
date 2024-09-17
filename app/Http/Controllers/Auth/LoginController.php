<?php
 
 namespace App\Http\Controllers\Auth;

 use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    public function show() {
        return view("auth.login");
    }


    protected function isNotBanned(User $user) {
        $status = User::find($user->id);

        if($status->status == "banned") {
            return false;
        }

        return true;
    }




    public function login(Request $request): RedirectResponse
    {

        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'], 
        ]);
 
        if (Auth::attemptWhen($credentials, function (User $user) {
            return $this->isNotBanned($user);
        })) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'username' => 'Wrong username',
        ])->onlyInput('username');
    }

    public function logout(Request $request) {
        if(Auth::check()) {
            Auth::logout();
 
            $request->session()->invalidate();
         
            $request->session()->regenerateToken(); 
        }

        return redirect('/');
    }
}