<?php
use App\Http\Controllers\anggotacontroller;
use App\Http\Controllers\bookcontroller;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('dasbord',[
        "title"=>"Dashboard"
    ]);
});

Route::resource('orang', anggotacontroller::class)->except('destroy')->middleware('auth');
Route::resource('user', UserController::class)->except('destroy','show','update','edit','create')->middleware('auth');
Route::get('login',[LoginController::class,'loginView'])->name('login');
route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');
Route::resource('book', bookcontroller::class);
Route::POST('carii',[bookcontroller::class,'cari'])->name('caribook');