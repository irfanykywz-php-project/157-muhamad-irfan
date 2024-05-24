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
        //dd($user->files[0]);

        $files = $user->files()
            ->select([
                'name',
                'size',
                'ext',
                'code',
                'created_at',
                'downloaded'
            ])
            ->latest()
            ->paginate(8);

        return view('user.files-public', [
            'user' => $user,
            'files' => $files
        ]);
    }
}
