<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('home');
})->name('home');

// latest
Route::get('/latest', function (){
    return view('latest');
})->name('latest');

// trending
Route::get('/trending', function (){
    return view('trending');
})->name('trending');

// upload
Route::get('/upload', function (){
    return view('upload');
})->name('upload');
Route::post('/upload', function (){
    // TODO upload process
});

// search
Route::get('/search', function (){
    return view('search');
})->name('search');

// file download
Route::get('/download/{file}', function ($file){
    return view('download');
})->name('download');

// user public
Route::prefix('/user/{name}')->group(function (){
    Route::get('/', function (){
        return view('user-public');
    })->name('user.public');
    Route::get('/files', function (){
        return view('user-files');
    })->name('user.files');
})->name('user');

// category by extension
Route::get('/category/{category}', function ($category){
    return view('category');
})->name('category');

// auth
Route::get('/login', function (){
    return view('auth.login');
})->name('login');
Route::post('/login', function (){
    // TODO login process
});
Route::get('/register', function (){
    return view('auth.register');
})->name('register');
Route::post('/register', function (){
    // TODO register process
});
Route::get('/logout', function (){
    // TODO logout
})->name('logout');

// page
Route::get('/p/{page}', function ($page){
    return view("page/{$page}");
});

// auth page
Route::middleware(['auth', 'auth.session'])->group(function () {
    // files
    Route::get('/files', function (){
        return view('user.files');
    })->name('files');

    // profile
    Route::get('/profile', function (){
        return view('user.profile');
    })->name('profile');
});

// file detail
Route::get('/{file}', function ($file){
    return view('file');
})->name('file');
