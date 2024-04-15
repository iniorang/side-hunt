<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SideJobController;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/sidejob', \App\Http\Controllers\SideJobController::class);

