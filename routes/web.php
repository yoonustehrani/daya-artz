<?php

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

Route::view('/', 'welcome')->name('home');

Route::view('about', 'pages.about')->name('about');
Route::view('contact', 'pages.contact')->name('contact');
Route::view('policy', 'pages.policy')->name('policy');
Route::view('services', 'pages.services.index')->name('services.index');
Route::view('blog', 'pages.posts.index')->name('blog.index');
Route::get('blog/{title}', function($title) {
    return view('pages.posts.show', compact('title'));
})->name('blog.show');