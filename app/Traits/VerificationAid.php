<?php

namespace App\Traits;

use App\VerificationCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

trait VerificationAid {
    public function generateVerificationCode(string $purpose, string $code, bool $forEmail = true, int $minutesToExpire = 10)
    {
        $verification = new VerificationCode();
        $verification->type = $purpose;
        $verification->code = $code;
        $verification->expires_at = now()->addMinutes($minutesToExpire);
        $verification->sent_by = $forEmail ? 'email' : 'sms';
        $this->verification_codes()->create($verification->toArray());
        return $verification;
    }
    public function generateVerificationUrl()
    {
        return URL::temporarySignedRoute(
            'verification.email.verify',
            Carbon::now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $this->getKey(),
                'hash' => sha1($this->email)
            ]
        );
    }
    public function hasVerifiedEmail()
    {
        return !! $this->email_verified_at;
    }
    public function markEmailAsVerified()
    {
        if (! $this->hasVerifiedEmail()) {
            $this->email_verified_at = now();
            return $this->save();
        }
        return false;
    }
}