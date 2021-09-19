<?php

namespace App\Traits;

use App\VerificationCode;

trait VerifyCodeTrait {
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
}