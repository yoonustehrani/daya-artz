<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        // $user->
    }
}