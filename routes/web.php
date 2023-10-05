<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
 Route::get('/', function () {
    return view('welcome');
}); 
*/


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/home', [LoginController::class, 'home'])->name('home')->middleware('auth');
Route::get('/user', [LoginController::class, 'user'])->name('user');
Route::post('/task/save', [TaskController::class, 'save_task'])->name('simpan_task');

Route::post('/user/simpan_user', [LoginController::class, 'save_user'])->name('simpan_user');

Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::post('/user/update_foto_user', [UserController::class, 'update_img'])->name('update_foto');
Route::post('/task/update_task_data', [TaskController::class, 'update_data_task'])->name('update_task');
Route::post('/task/delete', [TaskController::class, 'delete_data'])->name('delete_task');
Route::post('/user/import', [UserController::class, 'import'])->name('import');

Route::get('/task', [TaskController::class, 'index'])->name('task')->middleware('auth');

