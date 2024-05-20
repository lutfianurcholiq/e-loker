<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Registrasi'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'gender' => 'required',
            'email' => 'required|email:dns|unique:users',
            'role' => 'max:255',
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required|min:8|max:15|required_with:password|same:password'
        ]);

        // return $request;

        $validated['password'] = bcrypt($validated['password']);
        $validated['role'] = 'applyer';

        User::create($validated);

        return redirect('/login')->with('success','Registrasi Berhasil');

    }
}
