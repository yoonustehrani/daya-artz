<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'title'];
    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
