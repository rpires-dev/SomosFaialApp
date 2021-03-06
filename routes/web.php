<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PollController;
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
// Route::get('/sondagens', function () {
//     return view('/polls.index');
// });



Route::get('/', [LandingPageController::class, 'index']);


// POLLS
Route::get('/sondagens', [PollController::class, 'index']);
Route::get('/sondagens/{slug}', [PollController::class, 'show']);
Route::post('/sondagens', [PollController::class, 'vote'])->name('poll.vote');


// POSTS
Route::get('/p/{slug}', [BlogController::class, 'singlePost']);
Route::get('/autores/{authorId}/{authorName}', [BlogController::class, 'ByUser']);
Route::get('/c/{slug}', [BlogController::class, 'ByCategory']);

// PAGES
Route::get('/sobre', [PagesController::class, 'about']);
Route::get('/termos', [PagesController::class, 'termos']);
Route::get('/privacidade', [PagesController::class, 'privacidade']);
Route::get('/regulamento', [PagesController::class, 'regulamento']);
Route::get('/documentos', [PagesController::class, 'documentos']);


// CONTACT
Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

// PROJECTS
Route::get('/projetos', [ProjectsController::class, 'index'])->name('projetos.index');
Route::get('/proj/{slug}', [ProjectsController::class, 'show']);


// CALENDAR
Route::get('/eventos', [CalendarController::class, 'index']);
Route::get('/e/{slug}', [CalendarController::class, 'show']);

// COMMENTS
Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::patch('/editComment/{id}', [CommentsController::class, 'update'])->name('comment.update');
Route::delete('removeComment/{id}', [CommentsController::class, 'delete'])->name('comment.delete');

// USER PAGE

#TODO IF is not valable delete
// Route::post('users/{id}', function ($id) {
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
