<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/job', \App\Http\Controllers\JobController::class)->middleware('auth');

Auth::routes();

Route::get('/jumlahapply', [App\Http\Controllers\JobController::class, 'jumlahApply'])->name('job.jumlahApply');
Route::get('/daftarpelamar', [App\Http\Controllers\JobController::class, 'daftarPelamar'])->name('job.daftarPelamar');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes(['register' => true]);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::resource('/pelamar', \App\Http\Controllers\PelamarController::class);
Route::get('/pelamar', [App\Http\Controllers\PelamarController::class, 'index'])->name('pelamar.index')->middleware('auth');

Route::get('/pelamar-lokersimpan', [App\Http\Controllers\PelamarController::class, 'lokertersimpan'])->name('pelamar.lokertersimpan');

Route::post('/lamar/{job_id}', [App\Http\Controllers\JobController::class, 'lamarJob'])->name('job.lamarJob');
