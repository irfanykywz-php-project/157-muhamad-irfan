<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index()
    {
        return view('admin.files');
    }

    public function show(Request $request)
    {

        $files_query = Files::select([
                'files.id',
                'files.name',
                'files.downloaded',
                'files.viewed',
                'users.name as user'
            ])
            ->leftJoin('users', 'users.id', '=', 'files.user_id');

        $totalNotFiltered = $files_query->count();


        // search
        $search = $request->get('search');
        if (!empty($search)) {
            //dd($search);
            $files_query->where('files.name', 'like', '%'.$search.'%');
        }

        // sort & order
        $sort = $request->get('sort');
        $order = $request->get('order');
        if (isset($sort) AND isset($order)){
            $files_query->orderBy($sort, $order);
        }

        // total after search
        $total = $files_query->count();

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

    public function destroy(Request $request)
    {

        $ids = $request->post('ids');

        $files = Files::find($ids);

        $files_path = [];
        foreach ($files as $file){
            $files_path[] = $file['path'];
            $file->downloads()->delete();
            $file->delete();
        }
        // dd($files_path);

        // delete files
        Storage::delete($files_path);

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
