<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($category)
    {

        $files_query = Files::where('ext', '=', $category);

        $files = $files_query
            ->latest()
            ->paginate(
                $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at', 'downloaded'], $pageName = 'page'
            );

        return view('category', [
            'files' => $files
        ]);

    }
}
