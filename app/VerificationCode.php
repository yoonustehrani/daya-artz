<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $fillable = ['code', 'type', 'sent_by', 'expires_at'];
}
