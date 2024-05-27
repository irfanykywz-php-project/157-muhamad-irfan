<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index(){
        return view('auth.register');
    }

    public function process(Request $request){

        $user = $request->validate([
            'name' => ['required', 'string', 'regex:/\w*$/', 'max:255', 'unique:users,name'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'checklist' => ['required']
        ]);

        User::create(array_merge($user, [
            'role_id' => 3, // 3 = user,
            'photo' => 'default_profile.png'
        ]));

        return redirect()->route('login')
            ->with('message', 'register success, login now!');
    }
}
