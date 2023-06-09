<?php

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
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
})->name('home');


Route::middleware(["auth", "verified"])->name("admin.")->prefix("admin")->group(function ()
{
    Route::get("/", [DashboardController::class, "index"])->name("dashboard");
    Route::resource('characters', CharacterController::class)->parameters(["characters" => "character:slug"]);
    Route::resource('items', ItemController::class)->parameters(["items" => "item:slug"]);
    Route::resource('types',TypeController::class)->parameters(["types" => "type:slug"]);
});

require __DIR__ . '/auth.php';
