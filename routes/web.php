<?php

use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\PokemonsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::resource('pokemons', PokemonsController::class)->middleware('auth');

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::get('/pokemons', [PokemonsController::class, 'index'])->middleware('auth')->name('pokemons.index');
Route::get('/pokemones-favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
Route::view('/pokemones', "register")->name('registro');



Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout']) ->name('logout');

/* Route::post('/eliminar-favorito', [FavoritoController::class, 'destroy'])->name('pokemones.destroy'); */
Route::post('/pokemones-store', [FavoritoController::class, 'store'])->name('pokemones.store');
Route::resource('pokemones', FavoritoController::class)->middleware('auth');