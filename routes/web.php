<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectsController;
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


Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::post('/projetos', [ProjectsController::class, 'index'])->name('projetos.index');

Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::post('users/{id}', function ($id) {
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
