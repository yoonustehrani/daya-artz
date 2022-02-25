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
        return $this->morphMany(Image::class, 'imageable');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable')->latest();
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
