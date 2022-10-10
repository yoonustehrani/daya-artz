<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\User;

class TicketDepartment extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_department_id');
    }
}
