<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('UserStore', [AdminController::class, 'membershipUserStore']);
});

Route::view('/login', 'login')->name('login');
Route::post('/loginRequest', [AuthController::class, 'loginRequest']);

Route::get('/logout',function(){
    Auth::logout();
    return redirect("login");
});
