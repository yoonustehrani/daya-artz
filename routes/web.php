<?php

use App\Broadcasting\SMSChannel;
use App\Http\Controllers\WebsiteController;
use App\Http\Utils\SMS;
use App\Notifications\VerificationNotification;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
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

Route::get('/', [WebsiteController::class, 'index'])->name('home');

Route::get('services', [WebsiteController::class, 'services'])->name('services.index');
Route::get('services/{service}', [WebsiteController::class, 'service'])->name('services.show');

Route::view('blog', [WebsiteController::class, 'blog'])->name('blog.index');
Route::get('blog/{slug}', [WebsiteController::class, 'blog_post'])->name('blog.show');

Route::view('portfolio/{slug}', [WebsiteController::class, 'portfolio'])->name('portfolio.show');

Route::view('about', 'pages.about')->name('about');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('policy', 'pages.policy')->name('policy');

Route::view('userarea/{path?}', 'pages.userarea')->where('path', '.*')->name('userarea');


Route::get('email/verify/{id}/{hash}', function($id, $hash, Request $request) {
    $user = User::findOrFail($id);
    if (! hash_equals($hash, sha1($user->email))) {
        abort(401);
    }
    if ($user->hasVerifiedEmail()) {
        return 'email is already verified';
    }
    if ($user->markEmailAsVerified()) {
        # run event for user
    }
    return redirect()->to(route('userarea'));
})->middleware('signed')->name('verification.email.verify');

/* 
Route::get('test', function () {
    $user = User::find(2);
    $user->notifyNow(new VerificationNotification([SMSChannel::class]));
});
*/