<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['file_id', 'alt', 'caption', 'title'];
    public function imageable()
    {
        return $this->morphTo();
    }
    public function file()
    {
        return $this->belongsTo(File::class)->where('type', 'image')->select('id','path', 'thumbnail_path');
    }
}
