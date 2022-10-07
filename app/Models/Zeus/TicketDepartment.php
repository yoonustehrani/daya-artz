<?php

namespace App\Models\Zeus;

use App\Models\Ticket;
use Zeus\Models\User;
use Zeus\Models\ZeusModel;

class TicketDepartment extends ZeusModel
{
    public $timestamps = false;
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}