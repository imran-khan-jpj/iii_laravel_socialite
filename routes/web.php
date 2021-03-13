<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

// Auth::routes();
Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login/github', [LoginController::class, 'LoginWithGithub']);
    Route::get('/login/github/redirect', [LoginController::class, 'githubRedirect']);
});
Route::group(['middleware' => 'auth'], function(){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
