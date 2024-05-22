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

class ProfileController extends Controller
{
    public function index(User $user, Files $file)
    {

        $user = $user->where('id', Auth::user()->id)->firstOrFail();

        $total_download = Files::where('user_id', $user['id'])->sum('downloaded');
        $total_earning = Download::where('owner_id', $user['id'])->sum('reveneu');
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

        // delete file
        $files = Files::where('user_id', $user['id']);
        foreach ($files->get() as $file)
        {
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
