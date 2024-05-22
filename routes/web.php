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
Route::middleware(['guest'])->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'process']);
    Route::get('/forgot', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('forgot');
});

// user auth page
Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'process'])->name('logout');

    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit', [\App\Http\Controllers\User\ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profile/update', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('user.profile.update');;
    Route::get('/profile/delete', [\App\Http\Controllers\User\ProfileController::class, 'delete'])->name('user.profile.delete');
    Route::delete('/profile/destroy', [\App\Http\Controllers\User\ProfileController::class, 'destroy'])->name('user.profile.destroy');;

    Route::get('/files', [\App\Http\Controllers\User\FilesController::class, 'index'])->name('user.files');
    Route::get('/files/e/{code}', [\App\Http\Controllers\User\FilesController::class, 'edit']);
    Route::put('/files/e/{code}', [\App\Http\Controllers\User\FilesController::class, 'update']);
    Route::get('/files/d/{code}', [\App\Http\Controllers\User\FilesController::class, 'delete']);
    Route::delete('/files/d/{code}', [\App\Http\Controllers\User\FilesController::class, 'destroy']);

    Route::get('/reveneu', [\App\Http\Controllers\User\ReveneuController::class, 'index'])->name('user.reveneu');
    Route::get('/payment', [\App\Http\Controllers\User\PaymentController::class, 'payment'])->name('user.payment');
    Route::post('/payout', [\App\Http\Controllers\User\PaymentController::class, 'payout'])->name('user.payout');
});

// user public page
Route::get('/user/{name}', [\App\Http\Controllers\User\ProfilePublicController::class, 'index'])->name('public.profile');
Route::get('/user/{name}/files', [\App\Http\Controllers\user\FilesPublicController::class, 'index'])->name('public.files');

// file download
Route::get('/download/{code}', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download');
Route::get('/download/{code}/start', [\App\Http\Controllers\DownloadController::class, 'download'])->name('download.start');

// file detail
Route::get('/{code}', [\App\Http\Controllers\FileController::class, 'index'])->name('file');
