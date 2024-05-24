<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }

    public function show(Request $request)
    {

        $user_query = User::select([
            'users.id',
            'users.name',
            'users.status',
            DB::raw('COUNT(files.id) as total_files')
            ])
            ->leftJoin('files', 'files.user_id', '=', 'users.id')
            ->groupBy('users.id')
            ->whereNotIn('users.name', ['admin', 'guest']);

        $totalNotFiltered = $user_query->get()->count();

        // search
        $search = $request->get('search');
        if (!empty($search)) {
            //dd($search);
            $user_query->where('users.name', 'like', '%'.$search.'%');
        }

        // sort & order
        $sort = $request->get('sort');
        $order = $request->get('order');
        if (isset($sort) AND isset($order)){
            $user_query->orderBy($sort, $order);
        }

        // total after search
        $total = $user_query->get()->count();

        // offset & limit
        $offset = $request->get('offset');
        $limit = $request->get('limit');
        if (isset($offset) AND isset($limit)){
            $user_query = $user_query->offset($offset)->limit($limit);
        }

        $files = $user_query->get();

        return response()->json([
            'total' => $total,
            'totalNotFiltered' => $totalNotFiltered,
            'rows' => $files
        ]);
    }

    public function update(Request $request)
    {
        $ids = $request->post('ids');
        $status = $request->post('status');

        User::whereIn('id', $ids)->update(['status' => $status]);

        return response()->json([
            'status' => 'success'
        ], 200);
    }

    public function destroy(Request $request)
    {

        $ids = $request->post('ids');
        $users = User::whereIn('id', $ids)->with('files')->get();

        foreach ($users as $user){
            foreach ($user->files as $file) {
                // delete download files
                $file->downloads()->delete();
                // delete file
                $file->delete();
                Storage::delete($file['path']);
            }

            // delete payment
            $user->payments()->delete();
            $user->delete();
        }

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
