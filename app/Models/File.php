<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory, HasUuidAsPrimaryKey;

    protected $fillable = ['path', 'thumbnail_path', 'name', 'type'];
}
