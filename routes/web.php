<?php
use App\Http\Controllers\anggotacontroller;
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

Route::resource('orang', anggotacontroller::class)->except('destroy');
Route::resource('user', UserController::class)->except('destroy','show','update','edit','create');
