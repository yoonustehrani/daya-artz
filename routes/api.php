<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('auth')->name('auth.')->group(function() {
    Route::post('login', 'LoginController@login')->name('login'); // ->middleware('guest')
    Route::post('logout', 'LoginController@logout')->name('logout')->middleware('auth:sanctum');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('user', function (Request $request) {
        return $request->user()->load('customer', 'company');
    })->name('user')->middleware('auth:sanctum');
});



// Route::prefix('verification')->name('verification.')->group(function() { // ->middleware('auth:sanctum')
    
// });
// Route::prefix('userarea')->middleware('auth:sanctum')->prefix('userarea')->group(function() {
    
// });
// Route::get('/',function() {
//     return ['hello'];
// })->middleware('auth:sanctum');
// Route::prefix('userarea')

// Route::post('login')




// Route::get('hello', function() {
//     return response()->json([
//         'message' => 'hello'
//     ]);
// });