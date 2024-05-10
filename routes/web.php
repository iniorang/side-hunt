<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideJobController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sidejob/cari', [SideJobController::class,'cari'])->name('sidejob.cari');
Route::resource('/sidejob', SideJobController::class);

