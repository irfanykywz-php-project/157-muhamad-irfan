<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilesPublicController extends Controller
{
    public function index($name, User $user)
    {

        $user = $user->where('name', $name)->firstOrFail();

        $files = DB::table('files')
            ->where('user_id', $user['id'])
            ->orderBy('created_at', 'DESC')
            ->paginate(
                $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at', 'downloaded'], $pageName = 'page'
            );

        return view('user.files-public', [
            'user' => $user,
            'files' => $files
        ]);
    }
}
