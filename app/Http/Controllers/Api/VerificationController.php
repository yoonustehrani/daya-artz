<?php

namespace App\Http\Controllers\Api;

use App\Broadcasting\SMSChannel;
use App\Http\Controllers\Controller;
use App\Notifications\VerificationNotification;
use App\User;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VerificationController extends Controller
{
    protected $sms_max_attempts = 3;
    protected $email_max_attempts = 5;
    protected $decay_seconds = 60;
    public function resendSmsCode(Request $request)
    {
        $user = $request->user();
        $key = "phone-validation-user-{$user->phone_number}";
        $attempt_key = $key . "@ttempts";
        $attempts = Cache::rememberForever($key, function() { return 0;});
        // Returns Error if the number is blocked by total attempts 
        if ($attempts >= $this->sms_max_attempts) {
            return response()->json([
                'error' => 'NumberBlocked',
                'message' => 'This Phone Number is blocked on our server for attempting too much resend sms requests'
            ], 422);
        }
        // Returns error if the one attempt after specified decay time is attempted
        if ($this->limiter()->tooManyAttempts($attempt_key, 1)) {
            return response()->json([
                'error' => 'TooManyAttempts',
                'message' => 'request will be available in ' . $this->limiter()->availableIn($attempt_key),
            ], 429);
        }
        $retry_in = $this->decay_seconds * (($attempts / 2) + 1);
        $attempted = Cache::increment($key, 1);
        $this->limiter()->hit($attempt_key, $retry_in);
        $user->notify(new VerificationNotification([SMSChannel::class]));
        return [
            'okay' => true,
            'left_attempts' => $this->sms_max_attempts - $attempted,
            'next_attempt_in_seconds' => $attempted < $this->sms_max_attempts ? $retry_in : 0,
            'attempts' => $attempted
        ];
    }
    public function resendEmail(Request $request)
    {
        $user = $request->user();
        $key = "email-validation-user-{$user->email}";
        $attempt_key = $key . "@ttempts";
        $attempts = Cache::rememberForever($key, function() { return 0;});
        // Returns Error if the number is blocked by total attempts 
        if ($attempts >= $this->sms_max_attempts) {
            return response()->json([
                'error' => 'EmailBlocked',
                'message' => 'This Email is blocked on our server for attempting too much resend requests'
            ], 422);
        }
        // Returns error if the one attempt after specified decay time is attempted
        if ($this->limiter()->tooManyAttempts($attempt_key, 1)) {
            return response()->json([
                'error' => 'TooManyAttempts',
                'message' => 'request will be available in ' . $this->limiter()->availableIn($attempt_key),
            ], 429);
        }
        $retry_in = $this->decay_seconds * (($attempts / 2) + 1);
        $attempted = Cache::increment($key, 1);
        $this->limiter()->hit($attempt_key, $retry_in);
        $user->notify(new VerificationNotification(['mail']));
        return [
            'okay' => true,
            'left_attempts' => $this->email_max_attempts - $attempted,
            'next_attempt_in_seconds' => $attempted < $this->sms_max_attempts ? $retry_in : 0,
            'attempts' => $attempted
        ];
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
    private function limiter()
    {
        return app(RateLimiter::class);
    }
}