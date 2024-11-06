<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

route::get('/', function(){
    return view('welcome');
});

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// route unutk register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');


// Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout admin dan user
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin

// Route untuk dashboard admin (hanya diakses oleh admin)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

