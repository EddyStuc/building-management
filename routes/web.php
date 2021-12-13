<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\NoticeboardPostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/noticeboard', [NoticeboardPostController::class, 'index'])->middleware(['auth'])->name('noticeboard');
Route::get('noticeboard/{noticeboardpost:slug}', [NoticeboardPostController::class, 'show'])->middleware(['auth']);



require __DIR__.'/auth.php';

