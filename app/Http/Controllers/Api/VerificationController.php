<?php

namespace App\Http\Controllers\Api;

use App\Events\UserVerifiedTheirAccount;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        if ($user->phone_verified) {
            return $this->phoneAlreadyVerifiedResponse();
        }
        $key = "phone-validation-user-{$user->phone_number}";
        $attempt_key = $key . "@ttempts";
        $attempts = Cache::rememberForever($key, function() { return 0;});
        // Returns Error if the number is blocked by total attempts 
        if ($attempts >= $this->sms_max_attempts) {
            return response()->json([
                'error' => 'NumberBlocked',
                'message' => __('auth.phone_block')
            ], 403);
        }
        // Returns error if the one attempt after specified decay time is attempted
        if ($this->limiter()->tooManyAttempts($attempt_key, 1)) {
            return $this->tooManyAttemptsResponse($attempt_key);
        }
        $retry_in = $this->decay_seconds * (($attempts / 2) + 1);
        $attempted = Cache::increment($key, 1);
        $this->limiter()->hit($attempt_key, $retry_in);
        $user->resendSms();
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
        if ($user->email_verified_at) {
            return $this->emailAlreadyVerifiedResponse();
        }
        $key = "email-validation-user-{$user->email}";
        $attempt_key = $key . "@ttempts";
        $attempts = Cache::rememberForever($key, function() { return 0;});
        // Returns Error if the number is blocked by total attempts 
        if ($attempts >= $this->sms_max_attempts) {
            return response()->json([
                'error' => 'EmailBlocked',
                'message' => __('auth.email_block')
            ], 403);
        }
        // Returns error if the one attempt after specified decay time is attempted
        if ($this->limiter()->tooManyAttempts($attempt_key, 1)) {
            return $this->tooManyAttemptsResponse($attempt_key);
        }
        $retry_in = $this->decay_seconds * (($attempts / 2) + 1);
        $attempted = Cache::increment($key, 1);
        $this->limiter()->hit($attempt_key, $retry_in);
        $user->resendEmail();
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
        try {
            \DB::beginTransaction();
            $verification = $user->sms_verification_codes()->latest()->first();
            if ($verification && $verification->code) {
                if ($verification->code == $request->input('code')) {
                    $user->phone_verified = true;
                    if ($user->level === 'register') {
                        $user->level = 'new';
                    }
                    if ($user->save()) {
                        \Cache::forget("phone-validation-user-{$user->phone_number}");
                        $verification->delete();
                        \DB::commit();
                        event(new UserVerifiedTheirAccount($user));
                        return response()->json(['okay' => true, 'verified' => true]);
                    }
                }
            }
            \DB::rollback();
            return response()->json(['errors' => ['code' => ['کد وارد شده نامعتبر است.']]], 422);
        } catch (\Throwable $th) {
            \DB::rollback();
            return ['okay' => false, 'verified' => !! $user->phone_verified];
        }
    }
    public function editPhoneNumber(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|regex:/^9[0-9]{9}$/|unique:users,phone_number,' . $request->user()->getKey()
        ]);
        $user = $request->user();
        if ($user->phone_verified) {
            return $this->phoneAlreadyVerifiedResponse();
        }
        $user->phone_number = $request->input('phone_number');
        if ($user->save()) {
            $user->resendSms();
            return ['okay' => true];
        }
    }
    public function verifyEmail($id, $hash, Request $request) {
        $user = User::findOrFail($id);
        if (! hash_equals($hash, sha1($user->email))) {
            abort(401);
        }
        if ($user->hasVerifiedEmail()) {
            return 'email is already verified';
        }
        $user->email_verified_at = now();
        if ($user->level === 'register') {
            $user->level = 'new';
        }
        if ($user->save()) {
            \Cache::forget("email-validation-user-{$user->email}");
            event(new UserVerifiedTheirAccount($user));
        }
        return redirect()->to(route('userarea'));
    }
    public function editEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter,dns|unique:users,email,' . $request->user()->getKey()
        ]);
        $user = $request->user();
        if ($user->email_verified_at) {
            return $this->emailAlreadyVerifiedResponse();
        }
        $user->email = $request->input('email');
        if ($user->save()) {
            $user->resendEmail();
            return ['okay' => true];
        }
    }

    private function limiter()
    {
        return app(RateLimiter::class);
    }

    private function emailAlreadyVerifiedResponse()
    {
        return response()->json([
            'message' => __('auth.already_verified', ['field' => __('validation.attributes.email')]),
            'reason' => 'already_verified',
            'method' => 'email'
        ], 403);
    }
    private function phoneAlreadyVerifiedResponse()
    {
        return response()->json([
            'message' => __('auth.already_verified', ['field' => __('validation.attributes.phone_number')]),
            'reason' => 'already_verified',
            'method' => 'phone'
        ], 403);
    }
    private function tooManyAttemptsResponse($attempt_key)
    {
        return response()->json([
            'error' => 'TooManyAttempts',
            'message' => __('auth.attempts', ['seconds' => $this->limiter()->availableIn($attempt_key)]),
            'available_in' => $this->limiter()->availableIn($attempt_key)
        ], 429);
    }
}