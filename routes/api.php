<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideJobController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('checkAuth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
   
    Route::get('/sidejobs', [SideJobController::class, 'index']);
    Route::post('/sidejobs', [SideJobController::class, 'store']);
    Route::get('/sidejobs/{id}', [SideJobController::class, 'show']);
    Route::put('/sidejobs/{id}', [SideJobController::class, 'update']);
    Route::delete('/sidejobs/{id}', [SideJobController::class, 'destroy']);
    Route::post('/sidejobs/search', [SideJobController::class, 'cari']);
});