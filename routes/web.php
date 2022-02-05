<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Carbon\Carbon;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AdminController::class, 'index']);
Route::get('/register', [AdminController::class, 'register']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::get('admin/profile/change/{userid}', [AdminController::class, 'profilechange']);
  
Route::post('admin/profile/changeprofile',[AdminController::class,'changeprofile']);






