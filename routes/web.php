<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth AS AuthController;
use App\Http\Controllers\Cars AS CarController;
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

Route::get('/', [C\HomeController::class, 'homePage'])
    ->name('home');

Route::group(['prefix' => 'authorize', 'middleware' => 'guest', 'as' => 'user.'], function(){
    Route::get('/registration', [AuthController\RegistrationController::class, 'registrationView'])
        ->name('registration');

    Route::get('/login', [AuthController\LoginController::class, 'loginView'])
        ->name('login');
});

Route::group(['prefix' => 'authorize', 'as' => 'user.'], function(){
    Route::group(['middleware' => 'auth'], function(){
        Route::view('/admin', 'userAdmin.main')
            ->name('admin');

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

Route::group(['prefix' => 'cars', 'as' => 'car.'], function (){
   Route::get('/index', [CarController\CarsController::class, 'index'])
        ->name('index');

   Route::get('/create',[CarController\CarsController::class, 'create'])
        ->name('create');

   Route::post('/create',[CarController\CarsController::class, 'store']);

   Route::group(['prefix' => '{car}'], function (){
       Route::get('/', [CarController\CarsController::class, 'preview'])
           ->name('preview');

       Route::get('/edit', [CarController\CarsController::class, 'edit'])
           ->name('edit');

       Route::put('/edit', [CarController\CarsController::class, 'update']);

       Route::delete('/', [CarController\CarsController::class, 'destroy'])
            ->name('delete');

       Route::put('/restore', [CarController\CarsController::class, 'restore'])
           ->name('restore');
   });
});

