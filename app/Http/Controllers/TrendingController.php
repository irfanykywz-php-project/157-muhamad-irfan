<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingController extends Controller
{
    public function index(){
        $files = Files::whereDate('created_at', '>', now()->subDays(7))
            ->orderByRaw('CONVERT(viewed, SIGNED) DESC')
            ->paginate(
                $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at'], $pageName = 'files'
            );

        return view('trending', [
            'files' => $files
        ]);
    }
}
