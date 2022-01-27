<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // use ThrottlesLogins;
    protected $username;
    public function __construct()
    {
        $this->middleware('guest')->only('login');
    }
    public function login(Request $request)
    {
        $this->username = $this->getDesiredUsernameKey(array_keys($request->toArray()));
        $this->validateLogin($request);
        // if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);
        //     return $this->sendLockoutResponse($request);
        // }
        if ($this->attemptLogin($this->credentials($request))) {
            $request->session()->regenerate();
            return response()->json(['ok' => true, 'message' => 'Login Successful', 'user' => Auth::user()]);
        }
        // if fail should be run
        // $this->incrementLoginAttempts($request);
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')]
        ]);
        
    }
    public function attemptLogin($credentials)
    {
        return Auth::guard()->attempt($credentials, false);
    }
    public function validateLogin(Request $request)
    {
        $variable_rules = [
            'email' => 'required|email:filter',
            'phone_number' => 'required|string|regex:/^9[0-9]{9}$/',
        ];
        return $request->validate([
            $this->username() => $variable_rules[$this->username()],
            'password' => 'required|string'
        ]);
    }
    public function credentials(Request $request)
    {
        return [
            $this->username() => $request->input($this->username()),
            'password' => $request->input('password')
        ];
    }
    public function getDesiredUsernameKey($request)
    {
        $loginTypes = ['email','phone_number'];
        foreach ($loginTypes as $type) {
            if (in_array($type, $request)) {
                return $type;
            }
        }
        return $loginTypes[0];
    }
    public function username()
    {
        return $this->username;
    }
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->setRememberToken(null);
            auth()->user()->save();
            $request->session()->invalidate();
    
            $request->session()->regenerate();
            return ['ok' => true];
        }
        return ['ok' => false];
    }
}
