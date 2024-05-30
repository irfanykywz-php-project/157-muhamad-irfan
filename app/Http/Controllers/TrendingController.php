<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingController extends Controller
{
    public function index(){

        $files = File::select([
                'name',
                'size',
                'ext',
                'code',
                'created_at'
            ])
            ->whereDate('created_at', '>', now()->subDays(1)) // get file 3 days ago
            ->orderByRaw('downloaded DESC')
            ->orderByRaw('viewed DESC')
            //->orderByRaw('CONVERT(viewed, SIGNED) DESC')
            ->paginate(8);

        return view('trending', [
            'files' => $files
        ]);
    }
}
