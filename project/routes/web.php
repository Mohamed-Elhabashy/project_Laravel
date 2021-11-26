<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->prefix('dashboard')->as('admin.')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
        Route::get('/users', [UserController::class, 'users'])->name('users');
        Route::get('/admins', [UserController::class, 'admins'])->name('admins');
        Route::get('/create_user', [UserController::class, 'create_user'])->name('create_user');
        Route::post('/add_user', [UserController::class, 'store_user'])->name('store_user');

        Route::get('/show_messages', [MessageController::class, 'index'])->name('message.index');
        Route::get('/messages/delete/{message}', [MessageController::class, 'delete'])->name('message.delete');
    });
});
