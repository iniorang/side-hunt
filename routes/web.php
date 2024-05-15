<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideJobController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sidejob/cari', [SideJobController::class,'cari'])->name('sidejob.cari');
Route::get('/user/lamaran', [UsersController::class, 'pelamaran'])->name('user.history');
Route::resource('/sidejob', SideJobController::class);
Route::post('/sidejob/{sidejob}/buatPermintaan', [SideJobController::class, 'buatPermintaan'])->name('sidejob.buatPermintaan');
Route::patch('/pelamar/{pelamar}/terima', [SideJobController::class, 'terima'])->name('pelamar.terima');
Route::patch('/pelamar/{pelamar}/tolak', [SideJobController::class, 'tolak'])->name('pelamar.tolak');

