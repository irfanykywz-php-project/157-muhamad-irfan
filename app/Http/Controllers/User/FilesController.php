<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index(Request $request)
    {

        $files_query = File::where('user_id', Auth::id());

        // when search is exist
        if ($q = $request->get('q')) {
            $files_query->where('name', 'like', '%'.$q.'%');
        }

        $files = $files_query
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


        return view('user.files', [
            'files'=> $files
        ]);
    }

    public function edit($code, File $file)
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

        File::where('code', $code)->update($file);

        return redirect()->route('user.files')->with('message', "{$file['name']} has edited!");
    }

    public function delete($code, File $file)
    {

        return view('user.file-delete', [
            'file' => $file->where('code', $code)->firstOrFail()
        ]);
    }

    public function destroy($code)
    {

        // delete file
        $file = File::where('code', $code)->firstOrFail();
        Storage::delete($file['path']);

        // delete database
        $file->downloads()->delete();
        $file->delete();

        return redirect()->route('user.files')->with('message', "{$file['name']} has deleted!");
    }
}
