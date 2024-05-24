<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReveneuController extends Controller
{
    public function index()
    {

        $reveneu = Download::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(reveneu) total_reveneu'),
                DB::raw('COUNT(*) as total_download')
            )
            ->where('owner_id', Auth::user()->id)
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->paginate(8);

        return view('user.reveneu', [
            'reveneu' => $reveneu
        ]);
    }
}
