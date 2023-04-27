<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/create', [UserController::class, 'store'])->name('user.store');
Route::post('/signin', [UserController::class, 'signin'])->name('user.signin');


Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/artikel/{artikel_id}', [UserController::class, 'artikel'])->name('user.artikel');
    Route::get('/withdraw', [UserController::class, 'withdraw'])->name('user.withdraw');
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/point/{artikel_id}/{id}', [UserController::class, 'point'])->name('user.point');
});