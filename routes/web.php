<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\NoticeboardPostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->middleware(['guest'])->name('welcome');

Route::get('noticeboard', [NoticeboardPostController::class, 'index'])->middleware(['auth'])->name('noticeboard');
Route::get('noticeboard/create', [NoticeboardPostController::class, 'create'])->middleware(['auth'])->name('noticeboard.create');
Route::get('noticeboard/{noticeboardpost:slug}', [NoticeboardPostController::class, 'show'])->middleware(['auth']);





require __DIR__.'/auth.php';

