<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PersonalaccController;
use App\Http\Controllers\StatementController;
use App\Http\Controllers\SpecializationController;
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
    return view('auth.login');
});
//Роуты для авторизации и регистрации
Auth::routes([]);
//Роуты для авторизованных пользователей
Route::group(['middleware'=>'auth'], function(){
    //роуты для заявок
    Route::get('/statements',[StatementController::class,'index'])->name('statement_index');
    Route::get('/statement/create',[StatementController::class,'create'])->name('statement_create');
    Route::post('/statement/create',[StatementController::class,'store'])->name('statement_ctore');
    Route::get('/statement/{statement}',[StatementController::class,'show'])->name('statement_show');
    Route::get('/statement/{statement}/delete',[StatementController::class,'destroy'])->name('statement_destroy');
    Route::get('/statement/{statement}/edit',[StatementController::class,'edit'])->name('statement_edit');
    Route::put('/statement/{statement}/update',[StatementController::class,'update'])->name('statement_update');
   //роут для главной страницы
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  //роуты для специальностей
  Route::get('/specializations',[SpecializationController::class,'index'])->name('specialization_index');
  //Роуты для пользователей с ролью админ
  Route::group(['middleware'=>'admin'], function(){
  Route::get('/specialization/create',[SpecializationController::class,'create'])->name('specialization_create');
  Route::post('/specialization/create',[SpecializationController::class,'store'])->name('specialization_store');
  Route::get('/specialization/{specialization}/delete',[SpecializationController::class,'destroy'])->name('specialization_destroy');
  Route::get('/specialization/{specialization}/edit',[SpecializationController::class,'edit'])->name('specialization_edit');
  Route::put('/specialization/{specialization}/update',[SpecializationController::class,'update'])->name('specialization_update');
  });

 });





