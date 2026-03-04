<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Videos
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

// Profile/Profil
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/kepengurusan', [ProfileController::class, 'kepengurusan'])->name('kepengurusan');
    Route::get('/keanggotaan', [ProfileController::class, 'keanggotaan'])->name('keanggotaan');
    Route::get('/struktur', [ProfileController::class, 'struktur'])->name('struktur');
});

// Admin Auth & Dashboard
use Illuminate\Support\Facades\Auth;

Route::get('/admin', function () {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }
    return redirect()->route('admin.dashboard');
});
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class, ['as' => 'admin']);
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class, ['as' => 'admin']);
    Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class, ['as' => 'admin']);
    Route::resource('board_members', \App\Http\Controllers\Admin\BoardMemberController::class, ['as' => 'admin']);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class, ['as' => 'admin']);
});
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
