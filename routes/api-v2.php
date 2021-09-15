<?php

use Carbon\Carbon;
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
    $personal_access_token = $user->createToken('authToken' . $user->id . time());


    // return response()->json([
    //     'access_token' => $token->accessToken
    // ]);
    return [
        'user' => $user->only(['id', 'name', 'email']),
        'token' => [
            'type' => 'Bearer',
            'accessToken' => $personal_access_token->accessToken,
            'expires_in' => Carbon::parse($personal_access_token->token->expires_at)->diffInSeconds(now())
        ]
    ];
});

// Route::prefix('userarea')->name('userarea.')->group(function() {
    
// });