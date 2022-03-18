<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasDetailsAttribute;
    public $timestamps = false;
    protected $fillable = ['parent_id', 'order', 'title', 'route', 'path'];
}
