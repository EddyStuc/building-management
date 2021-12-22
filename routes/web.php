<?php

use App\Http\Controllers\AdminNoticeboardController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NoticeboardPostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->middleware(['guest'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('noticeboard', [NoticeboardPostController::class, 'index'])->name('noticeboard');
    Route::get('noticeboard/create', [NoticeboardPostController::class, 'create'])->name('noticeboard.create');
    Route::get('noticeboard/{noticeboardPost:slug}', [NoticeboardPostController::class, 'show']);
    Route::post('noticeboard', [NoticeboardPostController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('reports', [ReportController::class, 'index'])->name('reports');
    Route::get('reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::get('reports/{report:slug}', [ReportController::class, 'show']);
    Route::post('reports', [ReportController::class, 'store']);
});

Route::post('reports/{report:slug}/comments', [CommentsController::class, 'store'])->middleware(['auth']);

Route::get('contact', [ContactMessageController::class, 'index'])->middleware(['auth'])->name('contact');
Route::post('contact', [ContactMessageController::class, 'store'])->middleware(['auth']);

Route::middleware(['can:admin'])->group(function () {
    Route::get('admin/noticeboard', [AdminNoticeboardController::class, 'index'])->name('admin.noticeboard');
    Route::get('admin/noticeboard/create', [AdminNoticeboardController::class, 'create'])->name('admin.noticeboard.create');
    Route::get('admin/noticeboard/{noticeboardPost:slug}', [AdminNoticeboardController::class, 'show']);
    Route::post('admin/noticeboard', [AdminNoticeboardController::class, 'store']);
});










require __DIR__.'/auth.php';

