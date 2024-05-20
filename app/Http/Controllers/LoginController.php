<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Log In'
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        // return $request;

        $credentials = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8|max:15'
        ]);
 
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
 
            return redirect('/dashboard')->with('success','Success Login');
        }
 
        return back()->withErrors([
            'username' => 'Please Check Your Username',
            'password' => 'Please Check Your Password'
        ])->onlyInput(['username','password']);

    }

    public function logout(Request $request)
    {
        Auth::logout();   
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success','You Are Logout Right Now');
        
    }
}
