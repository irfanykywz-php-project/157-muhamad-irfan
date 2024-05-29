<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function authenticate()
    {
        $GoogleUser = Socialite::driver('google')->user();

        // check user exist
        if (!$user = User::where('email', $GoogleUser->email)->first()){
            // user not exist
            // create new user
            $user = User::create([
                'name' => strtolower(str_replace(' ', '', $GoogleUser->name)) . '_' . strtolower(Str::random(4)),
                'email' => $GoogleUser->email,
                'email_verified_at' => now(),
                'password' => Hash::make(''),
                'role_id' => 3, // 3 = user
                'photo' => $GoogleUser->avatar,
            ]);
        }

        Auth::login($user);

        return redirect()->route('user.profile');
    }
}
