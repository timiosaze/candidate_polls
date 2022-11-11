<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PollController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
Route::get('/message', function () {
   
    $message = [
        "from_email" => "hello@example.com",
        "subject" => "Hello world",
        "text" => "Welcome to Mailchimp Transactional!",
        "to" => [
            [
                "email" => "timiade1993@gmail.com",
                "type" => "to"
            ]
        ]
    ];

        try {
            $mailchimp = new \MailchimpTransactional\ApiClient();
            $mailchimp->setApiKey(config('services.mailchimp.transactional'));
    
            $response = $mailchimp->messages->send(["message" => $message]);
            
        } catch (Error $e) {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    
        dd($response);
});
Route::view('/test', 'page.index');
// Route::view('/test2', 'page.comments');
Route::view('/test3', 'page.test');
// Route::view('/polls', 'page.polls');
Route::get('/polls', [PollController::class, 'polls'])->name('polls');
Route::get('/comments', [CommentController::class, 'comments'])->name('comments');
Route::get('/achievements', [CommentController::class, 'achievements'])->name('achievements');
Route::get('/morepolls', [PollController::class, 'more_polls'])->name('more_polls');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_store');

Route::middleware(['auth', 'auth.session', 'verified'])->group(function () {
    Route::get('/poll', [PollController::class, 'candidates'])->name('polla');
    // Route::post('/polla', [PollController::class, 'store_candidate'])->name('store_polla');
    // Route::get('/pollb', [PollController::class, 'comments'])->name('pollb');
    // Route::post('/pollb', [PollController::class, 'store_comment'])->name('store_pollb');
    // Route::get('/pollc', [PollController::class, 'statespoll'])->name('pollc');
    // Route::post('/pollc', [PollController::class, 'store_prediction'])->name('store_pollc');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/test4', [CandidateController::class, 'addpics']);
Route::get('/', function () {
    return view('page.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
