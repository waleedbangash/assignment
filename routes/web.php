<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\clientController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middelware'=>['isAdmin','auth']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('creat-rack',[AdminController::class,'createRack'])->name('admin.createRack');
    Route::post('store-rack',[AdminController::class,'storeRack'])->name('admin.storeRack');
    Route::get('show-racks',[AdminController::class,'showRacks'])->name('admin.showRacks');
    Route::get('create-book/{id}',[AdminController::class,'createBook'])->name('admin.createBook');
    Route::post('store-book/{rack_id}',[AdminController::class,'storeBook'])->name('admin.storeBook');
    Route::get('rack-detail/{id}',[AdminController::class,'rackDetail'])->name('admin.rackDetail');

});

Route::group(['prefix'=>'client', 'middleware'=>['isClient','auth']], function(){
    Route::get('dashboard',[clientController::class,'index'])->name('client.dashboard');
    Route::get('show-racks',[clientController::class,'showRacks'])->name('client.showRacks');
    Route::get('rack-detail/{id}',[clientController::class,'rackDetail'])->name('client.rackDetail');
    Route::get('/search/{$rack_id}',[clientController::class,'search'])->name('client.search');

});
