<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class UploadController extends Controller
{

    public function upload(Request $request, FileReceiver $receiver)
    {

        $request->validate([
            'file' => [
                'required',
                \Illuminate\Validation\Rules\File::default()->max('100mb'),
                ''
            ],
            'description' => ['nullable', 'max:255']
        ]);

        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        // receive the file
        $save = $receiver->receive();

        // check mime
        if (str_contains($save->getClientMimeType(), 'video')) {
            throw new ExtensionFileException();
        }

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need
            return $this->saveFile($save->getFile());
        }

        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone(),
        ]);
    }

    protected function saveFile(UploadedFile $file)
    {

        // move to storage
        $path = Storage::disk('local')->putFile('files', $file);

        // save
        File::create([
            'user_id' => Auth::user()?->role('user') ? Auth::id() : 2, // 2 = guest user
            'name' => $file->getClientOriginalName(),
            'ext' => $file->extension(),
            'size' => $file->getSize(),
            'path' => $path,
            'code' => $code = Str::random(8),
            'description' => \request()->post('description'),
        ]);

        // delete chunks file
//        Storage::disk('local')->delete('chunks/' . $file->getFilename());
        unlink($file->getPathname());

        return response()->json([
            'code' => $code,
            'url' => route('file', $code),
        ]);
    }

}
