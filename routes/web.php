<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;

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


Route::get('/', [CharactersController::class, 'index'])->name('home');

Route::get('/characters/{id}', function ($id) {
    $characters = config('db_game.characters');
    $data = config("db_partials", "dbPartials");
    if ($id >= 0 && $id < count($characters)) {
        $character = $characters[$id];
        return view('characters.show', compact('character', 'data'));
    } else {
        abort('404');
    }
})->name('characters.show');