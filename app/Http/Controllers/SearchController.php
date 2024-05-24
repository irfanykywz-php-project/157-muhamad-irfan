<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $files_query = Files::select([
            'name',
            'size',
            'ext',
            'code',
            'created_at'
        ])
        ->where('name', 'like', '%'. $request->get('q') .'%');

        $files = $files_query
            ->latest()
            ->paginate(8);

        return view('search', [
            'files' => $files
        ]);
    }
}
