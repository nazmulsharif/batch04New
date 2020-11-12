<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\PagesController;
use App\Http\Controllers\backEnd\AdminController;

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
 
 /*---FrontEnd Routes Start ------------ --------------------*/
 Route::get('/',[PagesController::class,'index'])->name('frontEnd.home');

 Route::prefix('frontEnd')->group(function(){	
	 Route::get('about-us',[PagesController::class,'about'])->name('frontEnd.about_us');
	 Route::get('services',[PagesController::class,'services'])->name('frontEnd.services');
	 Route::get('blog',[PagesController::class,'blog'])->name('frontEnd.blog');
	 Route::get('contact',[PagesController::class,'contact'])->name('frontEnd.contact');
 });

 /*---------------------FrontEnd Routes End ------------ */


 /*---BackEnd Routes Start ------------ --------------------*/
	Route::get('/admin',[App\Http\Controllers\BackEnd\PagesController::class,'index']);
/*---------user Routes Start --------------------------------------*/
	Route::prefix('user')->group(function(){
		Route::get('manage',[AdminController::class,'index'])->name('user.manage');
		Route::get('create',[AdminController::class,'create'])->name('user.create');
		Route::post('store',[AdminController::class,'store'])->name('user.store');
		Route::get('edit/{id}',[AdminController::class,'edit'])->name('user.edit');
		Route::post('update/{id}',[AdminController::class,'update'])->name('user.update');
		Route::get('delete/{id}',[AdminController::class,'destroy'])->name('user.delete');
	});





/*---------user Routes End--------------------------------------*/


  /*---BackEnd Routes End ------------ --------------------*/





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


