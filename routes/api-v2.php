<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('login', function(Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if (! Auth::attempt($credentials)) {
        return response()->json(['message' => 'Login is not valid'], 401);
    }
    $user = Auth::user();
    return [
        'user' => $user,
        'token' => $user->createToken('authToken' . $user->id . time())
    ];
});

// Route::prefix('userarea')->name('userarea.')->group(function() {
    
// });