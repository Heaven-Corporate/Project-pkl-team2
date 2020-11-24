<?php

use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\MateriController;
use App\Models\Materi;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('kelolauser',KelolaUserController::class);
Route::get('/kelolasiswa',[KelolaUserController::class,'siswa'])->name('kelolasiswa');
Route::put('/aktivasi/{user}',[KelolaUserController::class,'aktivasi'])->name('admin.aktivasi');

Route::resource('materi',MateriController::class);
Route::post('store/materi',[MateriController::class,'storeSubMateri'])->name('store.materi');
Route::delete('materi/delete/{id}',[MateriController::class,'delete'])->name('materi.delete');

