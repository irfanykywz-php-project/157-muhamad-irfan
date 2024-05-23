<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestController extends Controller
{
    public function index(){

        $files = Files::latest()
            ->paginate(
            $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at'], $pageName = 'files'
            );

        return view('latest', [
            'files' => $files
        ]);
    }
}
