<?php
use App\Http\Middleware\Admin;
use App\Http\Middleware\Petugas;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataKendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['register' => false]);
Auth::routes();

Route::get('/frontend', function () {
    return view('frontend.index');
})->middleware('auth');

//admin
Route::middleware(['auth', Admin::class])->group(function () {
    Route::get('/backend', fn() => view('backend.index'));
    Route::resource('datakendaraan', DataKendaraanController::class);

    // Route::get('/admin/users', [UserController::class, 'index']);
});


//Petugas
Route::middleware(['auth', Petugas::class])->group(function () {
    Route::get('/frontend', function () {
        return view('frontend.index');
    Route::resource('datakendaraan', DataKendaraanController::class);

    });
});

