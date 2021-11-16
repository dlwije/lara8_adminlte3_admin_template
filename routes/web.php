<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
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

Auth::routes();

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/my-company',[HomeController::class,'myCompany'])->name('myCompany');

Route::get('/employee-list',[HomeController::class,'employeeList'])->name('employeeList');
Route::get('/employee-create',[HomeController::class,'employeeCreate'])->name('employee.create');
Route::post('/employee-create-submit',[HomeController::class,'employeeCreateSubmit'])->name('employeeCreateSubmit');

Route::resource('/role', RoleController::class)->only(['index','create','show','destroy','update','edit']);
Route::post('/role/store',[RoleController::class,'store'])->name('role.store');
Route::get('roles/list',[RoleController::class,'getRoles'])->name('roles.list');

Route::resource('/user', UserController::class)->only(['index','create','show','destroy','update','edit']);
Route::post('/users/store',[UserController::class,'store']);
Route::get('users/list', [UserController::class,'getUsers'])->name('users.list');

//laravel 7
//Route::resource('/user','UserController', ['only' => ['index','create','show','destroy','update','edit']]);
//Route::get('users/list','UserController@getUsers')->name('users.list');
