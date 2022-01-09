<?php

use App\Http\Controllers\Admin\AdminContactMessageController;
use App\Http\Controllers\Admin\AdminNoticeboardController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NoticeboardPostController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->middleware(['guest'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('noticeboard', [NoticeboardPostController::class, 'index'])->name('noticeboard');
    Route::get('noticeboard/create', [NoticeboardPostController::class, 'create'])->name('noticeboard.create');
    Route::get('noticeboard/{noticeboardPost:slug}', [NoticeboardPostController::class, 'show'])->name('noticeboard.show');
    Route::post('noticeboard', [NoticeboardPostController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('reports', [ReportController::class, 'index'])->name('reports');
    Route::get('reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::get('reports/{report:slug}', [ReportController::class, 'show'])->name('reports.show');
    Route::post('reports', [ReportController::class, 'store']);
});

Route::post('reports/{report:slug}/comments', [CommentsController::class, 'store'])->middleware(['auth'])->name('report.comment');

Route::middleware(['auth'])->group(function () {
    Route::get('contact', [ContactMessageController::class, 'index'])->name('contact');
    Route::post('contact', [ContactMessageController::class, 'store']);
});

Route::middleware(['can:admin'])->group(function () {
    Route::get('admin/noticeboard', [AdminNoticeboardController::class, 'index'])->name('admin.noticeboard');
    Route::get('admin/noticeboard/create', [AdminNoticeboardController::class, 'create'])->name('admin.noticeboard.create');
    Route::get('admin/noticeboard/{noticeboardPost:slug}', [AdminNoticeboardController::class, 'show'])->name('admin.noticeboard.show');
    Route::post('admin/noticeboard', [AdminNoticeboardController::class, 'store']);
    Route::get('admin/noticeboard/{noticeboardPost:slug}/edit', [AdminNoticeboardController::class, 'edit'])->name('admin.noticeboard.edit');
    Route::patch('admin/noticeboard/{noticeboardPost:slug}', [AdminNoticeboardController::class, 'update'])->name('admin.noticeboard.update');
    Route::delete('admin/noticeboard/{noticeboardPost:slug}', [AdminNoticeboardController::class, 'destroy'])->name('admin.noticeboard.delete');
});

Route::middleware(['can:admin'])->group(function () {
    Route::get('admin/reports', [AdminReportController::class, 'index'])->name('admin.reports');
    Route::get('admin/reports/create', [AdminReportController::class, 'create'])->name('admin.reports.create');
    Route::get('admin/reports/{report:slug}', [AdminReportController::class, 'show'])->name('admin.reports.show');
    Route::post('admin/reports', [AdminReportController::class, 'store']);
    Route::get('admin/reports/{report:slug}/edit', [AdminReportController::class, 'edit'])->name('admin.reports.edit');
    Route::patch('admin/reports/{report:slug}', [AdminReportController::class, 'update'])->name('admin.reports.update');
    Route::delete('admin/reports/{report:slug}', [AdminReportController::class, 'destroy'])->name('admin.reports.delete');
});

Route::middleware(['can:admin'])->group(function () {
    Route::get('admin/contactMessages', [AdminContactMessageController::class, 'index'])->name('admin.contactMessages');
    Route::get('admin/contactMessages/{contactMessage:slug}', [AdminContactMessageController::class, 'show'])->name('admin.contactMessages.show');
    Route::get('admin/contactMessages/{contactMessage:slug}/edit', [AdminContactMessageController::class, 'edit'])->name('admin.contactMessages.edit');
    Route::patch('admin/contactMessages/{contactMessage:slug}', [AdminContactMessageController::class, 'update'])->name('admin.contactMessages.update');
    Route::delete('admin/contactMessages/{contactMessage:slug}', [AdminContactMessageController::class, 'destroy'])->name('admin.contactMessages.delete');
});


require __DIR__.'/auth.php';

