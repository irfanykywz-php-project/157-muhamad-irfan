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
Route::get('/p/{page}', [\App\Http\Controllers\PageController::class, 'index'])->name('pages');

// auth
Route::middleware(['guest'])->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'process']);
    Route::get('/forgot', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('forgot');
});
Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'process'])->name('logout');

// admin page
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/files', [\App\Http\Controllers\Admin\FilesController::class, 'index'])->name('files');
    Route::get('/files/show', [\App\Http\Controllers\Admin\FilesController::class, 'show'])->name('files.show');
    Route::delete('/files/destroy', [\App\Http\Controllers\Admin\FilesController::class, 'destroy'])->name('files.destroy');

    Route::get('/payment', [\App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payment');
    Route::get('/payment/show', [\App\Http\Controllers\Admin\PaymentController::class, 'show'])->name('payment.show');
    Route::put('/payment/update', [\App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('payment.update');

    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::get('/user/show', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::put('/user/update', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
});

// user page
Route::middleware(['auth', 'auth.session' ,'role:user'])->name('user.')->group(function () {

    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [\App\Http\Controllers\User\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update');;
    Route::get('/profile/delete', [\App\Http\Controllers\User\ProfileController::class, 'delete'])->name('profile.delete');
    Route::delete('/profile/destroy', [\App\Http\Controllers\User\ProfileController::class, 'destroy'])->name('profile.destroy');;

    Route::get('/files', [\App\Http\Controllers\User\FilesController::class, 'index'])->name('files');
    Route::get('/files/e/{code}', [\App\Http\Controllers\User\FilesController::class, 'edit'])->name('files.edit');
    Route::put('/files/e/{code}', [\App\Http\Controllers\User\FilesController::class, 'update']);
    Route::get('/files/d/{code}', [\App\Http\Controllers\User\FilesController::class, 'delete'])->name('files.delete');
    Route::delete('/files/d/{code}', [\App\Http\Controllers\User\FilesController::class, 'destroy']);

    Route::get('/reveneu', [\App\Http\Controllers\User\ReveneuController::class, 'index'])->name('reveneu');
    Route::get('/payment', [\App\Http\Controllers\User\PaymentController::class, 'payment'])->name('payment');
    Route::post('/payout', [\App\Http\Controllers\User\PaymentController::class, 'payout'])->name('payout');
});

// user public page
Route::get('/user/{name}', [\App\Http\Controllers\User\ProfilePublicController::class, 'index'])->name('public.profile');
Route::get('/user/{name}/files', [\App\Http\Controllers\User\FilesPublicController::class, 'index'])->name('public.files');

// file download
Route::get('/download/{code}', [\App\Http\Controllers\DownloadController::class, 'index'])->name('download');
Route::get('/download/{code}/start', [\App\Http\Controllers\DownloadController::class, 'download'])->name('download.start');

// file detail
Route::get('/{code}', [\App\Http\Controllers\FileController::class, 'index'])->name('file');
