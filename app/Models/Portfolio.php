<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->morphedByMany(File::class, 'fileable')->whereType('image');
    }

    public function image()
    {
        return $this->images()->take(1);
    }
}
