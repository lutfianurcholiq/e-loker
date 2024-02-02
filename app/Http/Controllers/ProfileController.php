<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('master.profile.index', [
            'title' => 'Profile',
            'users' => $user
        ]);
    }

    public function update(Request $request)
    {
        if(auth()->user()->username != $request->username)
        {
            if($request->password != NULL)
            {
                $validate = $request->validate([
                    'name' => 'required|max:255',
                    'username' => 'required',
                    'gender' => 'required',
                    'password' => 'min:5|max:7'
                ]);

                $validate['password'] = bcrypt($validate['password']);
                User::where('id', auth()->user()->id)->update($validate);

                return redirect('/profile')->with('success', 'Profile Has Been Updated');

            }else{

                $validate = $request->validate([
                    'name' => 'required|max:255',
                    'username' => 'required',
                    'gender' => 'required',
                ]);

                User::where('id', auth()->user()->id)->update($validate);

                return redirect('/profile')->with('success', 'Profile Has Been Updated');
            }
        }else{

            if($request->password != NULL)
            {

                $validate = $request->validate([
                    'name' => 'required|max:255',
                    'gender' => 'required',
                    'password' => 'min:5|max:7'
                ]);

                $validate['password'] = bcrypt($validate['password']);
                User::where('id', auth()->user()->id)->update($validate);

                return redirect('/profile')->with('success', 'Profile Has Been Updated');

            }else{

                $validate = $request->validate([
                    'name' => 'required|max:255',
                    'gender' => 'required',
                ]);

                User::where('id', auth()->user()->id)->update($validate);

                return redirect('/profile')->with('success', 'Profile Has Been Updated');
                
            }
        }
        
    }
}
