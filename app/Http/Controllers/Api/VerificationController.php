<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function resendSmsCode(Request $request)
    {
        $request->user();
    }
    public function verifyPhoneNumber(Request $request)
    {

    }
}