<?php

use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'home'])->name('login');
Route::post('/', [LoginController::class, 'check_login'])->name('login-submit');
Route::get('/register', [LoginController::class, 'dangky'])->name('register');
Route::post('/register', [LoginController::class, 'check_dangky'])->name('register-submit');


////ROUTE DASH BOARD success login
Route::group(['prefix' => 'admin', 'middleware' => 'check'], function () {
    Route::get('/dashboard', [DashboardAdmin::class, 'dashboard'])->name('dashboard');
    Route::post('/dashboard-logout', [DashboardAdmin::class, 'logout'])->name('logout');
   Route::get('/add-post', [Postcontroller::class,'Postadd'])->name('add-post');
    Route::post('/insert-post', [Postcontroller::class, 'insert'])->name('insert-post');
    Route::get('/table-admin-get',[Postcontroller::class,'getValueforTable'])->name('getvalue-table-admin');
    Route::get('/table-admin',function(){return view ('layout.table-admin');})->name('table');
    route::post('/delete/{id}', [Postcontroller::class, 'delete'])->name('delete');
    Route::post('/deleteSelect', [PostController::class, 'deleteSelect'])->name('deleteSelect');
    Route::get('/update/{id}',[Postcontroller::class,'update'])->name('getvalue-update-post');
    Route::post('/updateForm/{id}', [PostController::class, 'updateForm']);
    ///// Users
});



