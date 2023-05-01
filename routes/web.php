<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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

require __DIR__.'/auth.php';

//backend Routes

Route::prefix('backend')->middleware(['auth'])->name('backend.')->group(function(){
    Route::get('/dashboard',[DashBoardController::class,'index'])->name('dashboard');

    //category routes
    Route::prefix('categories')->name('category.')->controller(CategoryController::class)->group(function(){
        Route::get('/','list')->name('list');
        Route::get('/add','add')->name('add');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/save/{id?}','save')->name('save');
        Route::get('/delete/{id}','delete')->name('delete');
    });

    //setting routes
    Route::prefix('settings')->name('setting.')->controller(SettingController::class)->group(function(){
        Route::get('/','list')->name('list');
        Route::post('/save','save')->name('save');
    });

});

//frontend Routes
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/detail',[HomeController::class,'detail'])->name('single');

