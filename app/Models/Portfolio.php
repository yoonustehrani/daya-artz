<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory, HasDetailsAttribute;

    public function images()
    {
        return $this->morphToMany(File::class, 'fileable')->whereType('image')->withPivot('details');
    }

    // public function image()
    // {
    //     return $this->morp(File::class, 'fileable')->whereType('image')->withPivot('details')->limit(1);
    // }
}
