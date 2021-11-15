<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user();
        if ($user->email !== $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        if ($user->phone_number !== $request->phone_number) {
            $user->phone_number = $request->phone_number;
            $user->phone_verified = null;
        }
        if ($request->password) {
            $user->password = bcrypt($request->input('password'));
        }
        return [
            'ok' => $user->save(),
            'user' => $user
        ];
    }
}