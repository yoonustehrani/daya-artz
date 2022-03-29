<?php

namespace Zeus\Models;

class Role extends BaseModel
{
    public $table = parent::TABLE_PREFIX . 'roles';
    public $timestamps = false;
}