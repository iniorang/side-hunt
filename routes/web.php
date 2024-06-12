<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideJobController;
use App\Http\Controllers\TransaksiController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cari', [SideJobController::class, 'cari'])->name('sidejob.cari');
Route::get('/job/{id}', [SideJobController::class, 'show'])->name('sidejob.detail');


Route::middleware(['auth'])->group(function () {
    Route::get('/user/lamaran', [UsersController::class, 'pelamaran'])->name('user.history');
    Route::get('/sidejob', [SideJobController::class, 'index'])->name('sidejob.index');
    Route::get('/sidejob/create', [SideJobController::class, 'create'])->name('sidejob.create');
    Route::post('/sidejob', [SideJobController::class, 'store'])->name('sidejob.store');
    Route::get('/sidejob/{id}', [SideJobController::class, 'show'])->name('sidejob.show');
    Route::get('/sidejob/{sidejob}/edit', [SideJobController::class, 'edit'])->name('sidejob.edit');
    Route::put('/sidejob/{sidejob}', [SideJobController::class, 'update'])->name('sidejob.update');
    Route::delete('/sidejob/{sidejob}', [SideJobController::class, 'destroy'])->name('sidejob.destroy');
    Route::post('/sidejob/{sidejob}/buatPermintaan', [SideJobController::class, 'buatPermintaan'])->name('sidejob.buatPermintaan');
    Route::patch('/pelamar/{pelamar}/terima', [SideJobController::class, 'terima'])->name('pelamar.terima');
    Route::patch('/pelamar/{pelamar}/tolak', [SideJobController::class, 'tolak'])->name('pelamar.tolak');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('user.transaksi');
});

Route::middleware(['isAdmin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin.index');
    Route::get('/admin/pelamar', [UsersController::class, 'pelamar'])->name('admin.pelamar');
    Route::get('/admin/pekerja', [UsersController::class, 'pekerja'])->name('admin.pekerja');
    Route::get('/admin/sidejob', [SideJobController::class, 'admin'])->name('admin.sidejob');
    Route::get('/admin/transaksi', [TransaksiController::class, 'admin'])->name('admin.transaksi');
});

