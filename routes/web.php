<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\RegistrationMiddleware;
use Illuminate\Http\Request;

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

Route::post('/registered',[RegistrationController::class,'createUser'])->name('registered');

Route::post('/home',[RegistrationController::class,'loged'])->name('loged');

Route::get('/logout',[RegistrationController::class,'logout'])->name('logout');

Route::post('/update/{id}',[RegistrationController::class,'update'])->name('update');

Route::post('/updatepassword/{id}',[RegistrationController::class,'updatepassword'])->name('updatepassword');

Route::get('/delete/{id}',[RegistrationController::class,'delete'])->name('delete');

Route::group(["middleware"=>["sessionCheck"]],function(){
    Route::get('/home',[RegistrationController::class,'home'])->name('home');
    Route::get('/contactus',[RegistrationController::class,'contactus'])->name('contactus');
    Route::get('/login',[RegistrationController::class,'login'])->name('login');
    Route::get('/register',[RegistrationController::class,'index'])->name('register');
    Route::get('/userlist',[RegistrationController::class,'userlist'])->name('userlist');
    Route::get('/useredit/{id}',[RegistrationController::class,'useredit'])->name('useredit');
    Route::get('/login',[RegistrationController::class,'login'])->name('login');
    Route::get('/passwordchange/{id}',[RegistrationController::class,'passwordchange'])->name('passwordchange');
});

