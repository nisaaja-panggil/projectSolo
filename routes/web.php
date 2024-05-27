<?php
use App\Http\Controllers\anggotacontroller;
use App\Http\Controllers\bookcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pinjamcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
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
})->middleware('auth');

Route::resource('orang', anggotacontroller::class)->except('destroy')->middleware('auth');
Route::resource('user', UserController::class)->except('destroy','show','update','edit','create')->middleware('auth');
Route::get('login',[LoginController::class,'loginView'])->name('login');
route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');
Route::resource('book', bookcontroller::class)->middleware('auth');
Route::POST('carii',[bookcontroller::class,'cari'])->name('caribook')->middleware('auth');
Route::resource('pinjam', pinjamcontroller::class)->middleware('auth');



// Route::get('pinjam',function(){
//     return view('pinjam.index',[
//         "title"=>"pinjam"
//     ]);
// })->middleware('auth');