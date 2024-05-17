<?php

use Illuminate\Support\Facades\Route;

// home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
// upload
Route::post('/upload', [\App\Http\Controllers\HomeController::class, 'upload'])->name('upload');

// latest
Route::get('/latest', [\App\Http\Controllers\LatestController::class, 'index'])->name('latest');

// trending
Route::get('/trending', [\App\Http\Controllers\TrendingController::class, 'index'])->name('trending');

// search
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');

// category by extension
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category');

// page
Route::get('/p/{page}', [\App\Http\Controllers\PageController::class, 'index']);

// auth
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'process']);
Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'process'])->name('logout');

// user auth page
Route::middleware(['auth', 'auth.session'])->group(function () {
    // files
    Route::get('/files', [\App\Http\Controllers\User\FilesController::class, 'index'])->name('user.files');

    // profile
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('user.profile');
});

// user public page
Route::get('/user/{username}', [\App\Http\Controllers\User\ProfilePublicController::class, 'index'])->name('public.profile');
Route::get('/user/{username}/files', [\App\Http\Controllers\user\FilesPublicController::class, 'index'])->name('public.files');

// file download
Route::get('/download/{code}', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download');
Route::get('/download/{code}/start', [\App\Http\Controllers\DownloadController::class, 'download']);

// file detail
Route::get('/{code}', [\App\Http\Controllers\FileController::class, 'index'])->name('file');
