<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth AS AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers AS C;
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
    return view('home');
})->name('home');

Route::group(['prefix' => 'authorize', 'middleware' => 'guest', 'as' => 'user.'], function(){
    Route::get('/registration', [AuthController\RegistrationController::class, 'registrationView'])
        ->name('registration');

    Route::get('/login', [AuthController\LoginController::class, 'loginView'])
        ->name('login');
});

Route::group(['prefix' => 'authorize', 'as' => 'user.'], function(){
    Route::group(['middleware' => 'auth'], function(){
//        Route::view('/admin', 'authorize.admin')
//            ->name('admin');

        Route::get('/profile', [C\UserController::class, 'profile'])
            ->name('profile');
    });

    Route::get('/logout', function (){
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');

    Route::post('/registration',[AuthController\RegistrationController::class, 'registration']);
    Route::post('/login',[AuthController\LoginController::class, 'login']);
});
