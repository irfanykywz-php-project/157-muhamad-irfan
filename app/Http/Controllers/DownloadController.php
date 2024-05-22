<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Files;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function index($code)
    {

        $file = Files::where('code', $code)->firstOrFail();

        return view('download', [
            'file' => $file
        ]);
    }

    public function download($code, Request $request, Files $file)
    {

        $file = $file->where('code', decrypt($code))->firstOrFail();

        /**
         * get reveneu by user level
         * criteria valid downloaded :
         * - when ip is not proxy
         * - when its not download by this user
         * - not in downloads table today
         * must add more validation to prevent bot!
         */
        $is_valid = true;
        // validate not in downloaded table today
        $ip_exist = Download::where('created_at', '>=', Carbon::today())
            ->where('owner_id', $file['user_id'])
            ->where('file_id', $file['id'])
            ->count();
        if ($ip_exist > 0){
            $is_valid = false;
        }
        // validate its download by this user > set invalid
        if (auth()->check()){
            if ($file['user_id'] == auth()->user()->id){
                $is_valid = false;
            }
        }
        // validate when ip file owner same as current session >
        // its a same user with different browser
        $check_owner_ip = DB::table('sessions')->select('ip_address')->where('user_id', $file['user_id']);
        if ($check_owner_ip->count() > 0){
            $owner = $check_owner_ip->first();
            // owner exist in session
            // then check if request ip same as owner ip > set invalid
            if ($request->ip() == $owner->ip_address){
                $is_valid = false;
            }
        }

        if ($is_valid){
            $total_download = Files::where('user_id', $file['user_id'])->sum('downloaded');
            $rate = $this->level($total_download, true);
            $downloaded_minimum = config('level.downloaded_minimum');
            // get reveneu
            $reveneu = $rate / $downloaded_minimum;
            // insert reveneu to downloaded > record ip
            Download::create([
                'owner_id' => $file['user_id'],
                'file_id' => $file['id'],
                'ip' => $request->ip(),
                'is_valid' => 'y',
                'reveneu' => $reveneu,
            ]);
            // update count downloaded
            $file->downloadedIncrement();
            // update user reveneu
            User::where('id', $file['user_id'])->increment('reveneu', $reveneu);
        }

        if (Storage::fileExists($file['path'])){
            return Storage::download($file['path'], $file['name']);
        }else{
            return view('download-error');
        }

    }
}
