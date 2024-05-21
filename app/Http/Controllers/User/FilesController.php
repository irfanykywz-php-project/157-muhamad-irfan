<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index()
    {

        $files_query = DB::table('files')
            ->where('user_id', Auth::id());

        $files_count = $files_query->get()->count();

        $files = $files_query
            ->latest()
            ->paginate(
                $perPage = 8, $columns = ['name', 'size', 'ext', 'code', 'created_at', 'downloaded'], $pageName = 'page'
            );


        return view('user.files', [
            'files_count' => $files_count,
            'files'=> $files
        ]);
    }

    public function edit($code, Files $file)
    {

        return view('user.file-edit', [
            'file' => $file->where('code', $code)->firstOrFail()
        ]);

    }

    public function update($code, Request $request)
    {
        $file = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable','max:255'],
        ]);

        $file['name'] = $file['name'] . '.' . $request->post('ext');

        Files::where('code', $code)->update($file);

        return redirect()->route('user.files')->with('message', "{$file['name']} has edited!");
    }

    public function delete($code, Files $file)
    {

        return view('user.file-delete', [
            'file' => $file->where('code', $code)->firstOrFail()
        ]);
    }

    public function destroy($code)
    {

        // delete file
        $file = Files::where('code', $code)->firstOrFail();
        Storage::delete($file['path']);

        // delete database
        Files::query()->where('code', $code)->delete();

        return redirect()->route('user.files')->with('message', "{$file['name']} has deleted!");
    }
}
