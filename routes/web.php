<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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
Route::get('users', [Controllers\UserController::class, 'getIndex']);
Route::get('user/{user}', [Controllers\UserController::class, 'getOne']);

Route::get('/', function () {
    return view('welcome');
});
