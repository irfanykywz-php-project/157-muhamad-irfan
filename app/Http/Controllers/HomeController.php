<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function upload(Request $request)
    {

        $request->validate([
            'file' => [
                'required',
                File::default()->max('100mb')
            ],
            'description' => ['nullable', 'max:255']
        ]);

        // get file information
        $file = $request->file('file');

        // store file to local > files folder
//        $path = $file->store('files');
        // store with Storage
        $path = Storage::disk('local')->putFile('files', $file);

        // save
        Files::create([
            'user_id' => Auth::user()?->role('user') ? Auth::id() : 2, // 2 = guest user
            'name' => $file->getClientOriginalName(),
            'ext' => $file->extension(),
            'size' => $file->getSize(),
            'path' => $path,
            'code' => $code = Str::random(8),
            'description' => $request->post('description'),
        ]);

        // redirect to previous file uploaded
        return redirect()->to("/{$code}");
    }

}
