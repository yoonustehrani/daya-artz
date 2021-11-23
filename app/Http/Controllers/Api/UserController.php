<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'email' => ['nullable', Rule::requiredIf(! $request->input('phone_number')), 'string', 'email:filter,dns', Rule::unique('users')->ignore($request->user()->id)],
            'phone_number' => ['nullable', Rule::requiredIf(! $request->input('email')), 'string', 'regex:/^9[0-9]{9}$/', Rule::unique('users')->ignore($request->user()->id)],
            'password' => 'nullable|string|min:8|max:60|confirmed'
        ]);

        $user = $request->user();
        if ($request->input('email') && $user->email !== $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        if ($request->input('phone_number') && $user->phone_number !== $request->phone_number) {
            $user->phone_number = $request->phone_number;
            $user->phone_verified = null;
        }
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        return [
            'ok' => $user->save(),
            'user' => $user
        ];
    }
}