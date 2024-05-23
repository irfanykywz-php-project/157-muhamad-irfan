<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }

    public function show(Request $request)
    {

        $files_query = User::select([
            'users.id',
            'users.name',
            'users.status',
            DB::raw('COUNT(files.id) as total_files')
            ])
            ->leftJoin('files', 'files.user_id', '=', 'users.id')
            ->groupBy('users.id');


        $totalNotFiltered = $files_query->get()->count();

        // search
        $search = $request->get('search');
        if (!empty($search)) {
            //dd($search);
            $files_query->where('users.name', 'like', '%'.$search.'%');
        }

        // sort & order
        $sort = $request->get('sort');
        $order = $request->get('order');
        if (isset($sort) AND isset($order)){
            $files_query->orderBy($sort, $order);
        }

        // total after search
        $total = $files_query->get()->count();

        // offset & limit
        $offset = $request->get('offset');
        $limit = $request->get('limit');
        if (isset($offset) AND isset($limit)){
            $files_query = $files_query->offset($offset)->limit($limit);
        }

        $files = $files_query->get();

        return response()->json([
            'total' => $total,
            'totalNotFiltered' => $totalNotFiltered,
            'rows' => $files
        ]);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
