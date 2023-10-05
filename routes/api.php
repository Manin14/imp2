<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//username dan password nyA adalah data email dan pasword di table users (basic auth api)
Route::middleware('auth.basic')->group(function () {

  Route::get('/get_data', [TaskController::class, 'get_data']);
  Route::post('/store', [TaskController::class, 'store']);
  Route::put('/update_api/{id}', [TaskController::class, 'update_api']);
  Route::delete('/destroy/{id}', [TaskController::class, 'destroy']);

});
