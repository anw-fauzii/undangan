<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/u/{id}', [WelcomeController::class, 'kode'])->name('kode.tamu');
Route::post('/update/komentar/{id}', [WelcomeController::class, 'update'])->name('welcome.update');
Route::resource('/daftar-tamu', TamuController::class);
Route::get('/hapus-tamu/{id}',[TamuController::class,'hapus'])->name('hapus.tamu');
//Optimize
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Clear Config cleared</h1>';
});