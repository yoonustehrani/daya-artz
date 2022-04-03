<?php

namespace ZeusExtensions\UniquePhoto\Models;

use Illuminate\Database\Eloquent\Model;
use Zeus\Models\File;

class Image extends Model
{
    public $timestamps = false;

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}