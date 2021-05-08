<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/p/{slug}', [BlogController::class, 'singlePost']);
Route::get('/autores/{authorId}/{authorName}', [BlogController::class, 'ByUser']);
Route::get('/c/{slug}', [BlogController::class, 'ByCategory']);

Route::get('/sobre', [PagesController::class, 'about']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
