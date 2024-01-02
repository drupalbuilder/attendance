<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [DashboardController::class, 'dashboard']);
Route::get('profile', [UserController::class, 'profile']);
Route::get('users', [UserController::class, 'users']);
Route::get('user/edit/{id}', [UserController::class, 'editUser']);
Route::get('user/add', [UserController::class, 'addUser']);
Route::post('user/save-user', [UserController::class, 'saveUser']);
Route::post('user/update', [UserController::class, 'updateUser']);
Route::get('user/password-edit/{id}', [UserController::class, 'editPasswordUser']);
Route::post('user/password/update', [UserController::class, 'passwordUpdateUser']);