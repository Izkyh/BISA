<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;

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
