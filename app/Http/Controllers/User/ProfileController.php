<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index(User $user)
    {

        $user = $user->where('id', Auth::user()->id)
            ->with('files')
            ->with('downloads')->firstOrFail();

        $total_download = $user->files->sum('downloaded');
        $total_earning = $user->downloads->sum('reveneu');
        $level = $this->level($total_download);

        return view('user.profile', [
            'user' => $user,
            'total_download' => $total_download,
            'total_earning' => $total_earning,
            'level' => $level,
        ]);
    }

    public function edit()
    {
        //
        return view('user.profile-edit', [
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'regex:/\w*$/', 'max:255', 'unique:users,name,' . Auth::user()->id],
            'password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }]
        ]);

        // update
        User::whereId(Auth::user()->id)->update($request->only(['name']));

        return redirect()->back()->with('message', 'success update profile!');
    }

    public function photo(Request $request)
    {

        // delete previous photo
        Storage::disk('public')->delete(Auth::user()->photo);

        // add new photo
        // https://laracasts.com/discuss/channels/laravel/create-image-from-base64-string-laravel
        $image_64 = $request->post('photo');
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',')+1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.$extension;
        $path = 'photo/'.$imageName;
        Storage::disk('public')->put($path, base64_decode($image));

        // update path
        User::where('id', Auth::id())->update([
            'photo' => $path
        ]);
    }

    public function delete()
    {
        return view('user.profile-delete');
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'confirm' => ['required']
        ]);

        // get user
        $user = User::find(Auth::user()->id);

        // delete payment
        $user->payments()->delete();

        // delete file
        $files = Files::where('user_id', $user['id']);
        foreach ($files->get() as $file)
        {
            $file->downloads()->delete();
            Storage::delete($file['path']);
        }
        $files->delete();


        // logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // delete user
        if ($user->delete()){
            return redirect()->route('login')->with('delete', 'Your account has been deleted!');
        }
    }
}
