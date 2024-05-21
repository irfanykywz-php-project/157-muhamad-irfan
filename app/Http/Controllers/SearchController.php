<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $files_query = DB::table('files')
            ->where('name', 'like', '%'.$request->get('q').'%');

        $files_count = $files_query->get()->count();

        $files = $files_query
            ->latest()
            ->paginate(
            $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at', 'downloaded'], $pageName = 'page'
        );

        return view('search', [
            'files' => $files,
            'files_count' => $files_count
        ]);
    }
}
