<?php

namespace Zeus\Models;

use Database\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends BaseModel
{
    use HasFactory;

    protected $table = self::TABLE_PREFIX . 'permissions';
    public $_title_ = 'title';
    public $timestamps = false;
    public function scopeActive($builder)
    {
        $builder->where('active', true);
    }
    protected static function newFactory() {
        return PermissionFactory::new();
    }
}