<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register()
    {
        // event(new Registered($user))
    }
    public function validateRegister()
    {

    }
}