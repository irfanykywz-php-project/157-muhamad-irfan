<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile', [
        ]);
    }

    public function edit()
    {
        //
        return view('user.profile-edit', [
        ]);
    }

    public function update()
    {
        return view('user.profile-edit')->with('message', 'success update profile!');
    }
}
