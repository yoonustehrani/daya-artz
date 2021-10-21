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
    public function resendEmail(Request $request)
    {

    }
    public function verifyPhoneNumber(Request $request)
    {
        $request->validate([
            'code' => 'required|string|numeric|digits:6'
        ]);
        $user = $request->user();
        $verification = $user->sms_verification_codes()->latest()->first();
        if ($verification && $verification->code) {
            if ($verification->code == $request->input('code')) {
                $user->phone_verified = true;
                return ['okay' => true, 'verified' => $user->save()]; //  && $verification->delete()
            }
        }
        return ['okay' => false, 'verified' => !! $user->phone_verified];
    }
}