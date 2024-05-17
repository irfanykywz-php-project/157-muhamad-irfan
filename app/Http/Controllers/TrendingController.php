<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingController extends Controller
{
    public function index(){
        $files = DB::table('files')
            ->orderBy('viewed', 'DESC')
//            ->orderBy('created_at', 'DESC')
            ->paginate(
                $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at'], $pageName = 'files'
            );

        return view('trending', [
            'files' => $files
        ]);
    }
}
