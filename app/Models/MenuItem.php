<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;

class MenuItem extends ZeusModel
{
    use HasDetailsAttribute;
    public $timestamps = false;
    protected $fillable = ['parent_id', 'order', 'title', 'route', 'path'];
}
