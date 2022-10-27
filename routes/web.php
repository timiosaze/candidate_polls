<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PollController;
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
Route::view('/test', 'page.index');
// Route::view('/test2', 'page.comments');
Route::view('/test3', 'page.test');
// Route::view('/polls', 'page.polls');
Route::get('/polls', [PollController::class, 'polls'])->name('polls');
Route::get('/comments', [CommentController::class, 'comments'])->name('comments');
Route::get('/achievements', [CommentController::class, 'achievements'])->name('achievements');
Route::get('/morepolls', [PollController::class, 'more_polls'])->name('more_polls');
Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::get('/polla', [PollController::class, 'candidates'])->name('polla');
    Route::post('/polla', [PollController::class, 'store_candidate'])->name('store_polla');
    Route::get('/pollb', [PollController::class, 'comments'])->name('pollb');
    Route::post('/pollb', [PollController::class, 'store_comment'])->name('store_pollb');
    Route::get('/pollc', [PollController::class, 'statespoll'])->name('pollc');
    Route::post('/pollc', [PollController::class, 'store_prediction'])->name('store_pollc');

});

// Route::get('/test4', [CandidateController::class, 'addpics']);
Route::get('/', function () {
    return view('page.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
