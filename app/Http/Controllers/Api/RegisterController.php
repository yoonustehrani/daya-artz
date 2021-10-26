<?php

namespace App\Http\Controllers\Api;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $username;
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request)
    {   
        $this->username = $this->getDesiredUsernameKey(array_keys($request->toArray()));
        $this->validateRegister($request);
        $user = $this->create($this->credentials($request));
        \Auth::guard()->login($user);
        event(new UserRegistered($user));
        return response()->json([
            'ok' => true, 'message' => 'Registered Successfully', 'user' => $user
        ]);
    }
    public function credentials(Request $request)
    {
        return [
            $this->username() => $request->input($this->username()),
            'password' => bcrypt($request->input('password'))
        ];
    }
    protected function create(array $data)
    {
        return User::create($data);
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
    public function validateRegister(Request $request)
    {
        $variable_rules = [
            'email' => 'required|email:filter,dns|unique:users',
            'phone_number' => 'required|string|regex:/^9[0-9]{9}$/|unique:users',
        ];
        return $request->validate([
            $this->username() => $variable_rules[$this->username()],
            'password' => 'required|string|min:8|confirmed'
        ]);
    }
}