<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WebsiteController;
use App\Notifications\EmailNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

//Admin Auth
// Route::get('/login', [AdminController::class, 'index'])->name('login');
// Route::get('/register', [AdminController::class, 'register']);

//Route::get('/admin/home', [AdminController::class, 'adminhome'])->name('admin.dashboard')->middleware('admin');


Route:: group(['prefix' => 'admin', 'middleware' => ['admin','auth'],'namespech' => 'admin'],function(){
   
    Route::get('dashboard',[AdminController::class,'adminindex'])->name('admin.dashboard');
});


Route:: group(['prefix' => 'user', 'middleware' => ['user','auth'],'namespech' => 'user'],function(){
   
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
});


// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });

// Route::group(['prifix' =>'admin','middleware' =>'auth'],function()
// {
    
//      Route::get('/dashboard', function () {
//         // Matches The "/admin/users" URL
//         return "Admin";
//     });
// });
Route::get('/admin/profile/', [AdminController::class, 'profile']);

Route::get('admin/profile/change/{userid}', [AdminController::class, 'changeprofile']);

Route::post('admin/profile/updateprofile',[AdminController::class,'updateprofile']);

//Password Change
Route::post('admin/profile/password/change',[AdminController::class,'changepassword']);

//Student CRUD
Route::get('admin/student/create',[StudentController::class,'create']);
Route::post('admin/student/insert',[StudentController::class,'store']);
Route::get('admin/student/studentlist',[StudentController::class,'index']);
Route::get('admin/student/studentshow/{student}',[StudentController::class,'show']);
Route::get('admin/student/studentedit/{student_id}',[StudentController::class,'edit']);
Route::post('admin/student/studentupdate',[StudentController::class,'update']);
Route::get('admin/student/studentdelete/{student_id}',[StudentController::class,'destroy']);
Route::get('admin/student/studentstatus/{student_status}',[StudentController::class,'studentstatus']);


//Model binding route
Route::get('admin/group/{id}',[AdminController::class,'group']);

//Accessor
Route::get('admin/show',[AdminController::class,'show']);
//mutator
Route::get('admin/student/',[AdminController::class,'student']);


///Frontend Route
Route::get('/',[WebsiteController::class,'index']);


// Email Notification

Route::get('/emailsend',function(){
    
    $user = User::find(1);
    $user->notify(new EmailNotification());
});

// Website Route

Route::get('/',[WebsiteController::class,'index']);