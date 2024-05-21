<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatestController extends Controller
{
    public function index(){

        $files = DB::table('files')
            ->latest()
            ->paginate(
            $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at'], $pageName = 'files'
            );

        return view('latest', [
            'files' => $files
        ]);
    }
}
