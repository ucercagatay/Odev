<?php

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
Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name('loginn');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('loginn');
Route::get  ('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logoutt');
Route::post('/register',[\App\Http\Controllers\LoginController::class,'create_user'])->name('register');



Route::prefix('/')->middleware('is_login')->group(function (){
Route::get('/',[\App\Http\Controllers\FrontController::class,'index'])->name('homepage');
Route::get('/fakulteler/{id}',[\App\Http\Controllers\FrontController::class,'fakulteler_index'])->name('fakulteler');
Route::get('/mezunlar/{id}',[\App\Http\Controllers\FrontController::class,'mezunlar_index'])->name('mezunlar');
Route::post('/post',[\App\Http\Controllers\FrontController::class,'post_create'])->name('post_create');
Route::get('/mezuninfo/{id}',[\App\Http\Controllers\FrontController::class,'mezun_info'])->name('mezun_info');
Route::post('/updateprofile',[\App\Http\Controllers\FrontController::class,'user_update'])->name('update_profile');
});

Route::prefix('/admin')->middleware('is_admin')->name('admin.')->group(function (){
    Route::get('/',[\App\Http\Controllers\PanelController::class,'index'])->name('dashboard');
    Route::get('/user/switch/{id}',[\App\Http\Controllers\PanelController::class,'switch'])->name('switch');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
