<?php

use App\Http\Controllers\UserController;
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

Route::get('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'register_request']);
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_request']);


Route::group(['prefix' => 'home', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'home']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::group(['middleware' => 'user'], function () {
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/create', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/edit/{id}', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'delete']);
    });
});
