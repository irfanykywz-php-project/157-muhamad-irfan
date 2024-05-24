<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($category)
    {

        $files = Files::select([
            'name',
            'size',
            'ext',
            'code',
            'created_at'
        ])->where('ext', '=', $category)->latest()->paginate(8);

        return view('category', [
            'files' => $files
        ]);

    }
}
