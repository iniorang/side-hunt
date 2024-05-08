<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideJobController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/sidejob', \App\Http\Controllers\SideJobController::class);
Route::get('/sidejob', [SideJobController::class,'cari'])->name('sidejob.cari');
