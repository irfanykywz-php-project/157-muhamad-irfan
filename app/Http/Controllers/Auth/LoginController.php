<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
//        dd(Auth::viaRemember());
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials, $request->post('remember') ?: false)) {

            // if role is guest > prevent login
            if (Auth::user()->role('guest')){
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'invalid' => 'guest cannot logined!'
                ]);
            }

            // if status is banned
            if (Auth::user()->status == 'banned'){
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors([
                    'invalid' => 'account has banned!'
                ]);
            }

            $request->session()->regenerate();

            // check role and redirect
            if (Auth::user()->role('admin')){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('user.profile');
            }
        }

        return back()->withErrors([
            'invalid' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

}
