<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/noticeboard', function () {
    return view('noticeboard');
})->middleware(['auth'])->name('noticeboard');


require __DIR__.'/auth.php';
