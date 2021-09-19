<?php

use App\Events\UserRegistered;
use App\User;
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

// Route::get('/', function() {
//     $user = User::first();
//     // $verification = "";
//     // return $user->generateVerificationCode('verify_phone', generate_code(), false, 2);
//     // event(new UserRegistered($user));
//     return $user;
// });

Route::view('/', 'welcome')->name('home');

Route::view('about', 'pages.about')->name('about');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('policy', 'pages.policy')->name('policy');
Route::view('services', 'pages.services.index')->name('services.index');
Route::get('services/{service}', function($service) {
    return view('pages.services.show', compact('service'));
})->name('services.show');
Route::view('blog', 'pages.posts.index')->name('blog.index');
Route::get('blog/{title}', function($title) {
    return view('pages.posts.show', compact('title'));
})->name('blog.show');
Route::view('portfolio/{title}', 'pages.portfolio')->name('portfolio.show');
Route::view('userarea/{path?}', 'pages.userarea')->where('path', '.*');
// Auth::routes(['register' => false]);
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {
    $user = User::find(2);
    event(new UserRegistered($user));
    return $user;
});