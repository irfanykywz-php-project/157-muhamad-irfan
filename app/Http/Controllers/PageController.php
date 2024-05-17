<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($page){
        try {
            return view("page.{$page}");
        } catch (\Throwable $th) {
            abort(404);
        }
    }
}
