<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestController extends Controller
{
    public function index(){

        $files = Files::select([
            'name',
            'size',
            'ext',
            'code',
            'created_at'
        ])->latest()->paginate(8);

        return view('latest', [
            'files' => $files
        ]);
    }
}
