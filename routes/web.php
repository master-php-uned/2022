<?php

use App\Http\Controllers\GuestsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\UsersController;
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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas proteguidas
Route::group(['middleware' => ['auth', "verified", "admin"]],
    function(){
        // Ruta generación PDF usuarios
        Route::get('users/pdf/{user?}', [UsersController::class, 'createPDF'])->name('users.createPDF');
        // Rutas de gestion del recurso usuarios
        Route::resource('users', UsersController::class);
});

Route::group([
        'middleware' => ['auth', "verified"]
    ],
    function(){
        // Rutas para usuarios miembros
        Route::get('members', [MembersController::class, 'index'])->name('members.index');

        // Rutas para usuarios invitados
        Route::get('guests', [GuestsController::class, 'index'])->name('guests.index');
});
