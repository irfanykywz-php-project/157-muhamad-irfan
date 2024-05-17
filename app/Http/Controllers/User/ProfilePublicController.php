<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilePublicController extends Controller
{
    public function index()
    {
        return view('user.public-profile');
    }
}
