<?php

namespace Zeus\Models;

use Zeus\Traits\HasDetailsAttribute;
use Zeus\Traits\HasUuidAsPrimary;

class ModelType extends BaseModel
{
    use HasDetailsAttribute, HasUuidAsPrimary;
    
    protected $table = self::TABLE_PREFIX . 'model_types';
    public $timestamps = false;
    public static function booted()
    {
        static::saved(function($modeltype) {
            \Log::alert("cached modeltypes");
            \Cache::forever('modeltypes', ModelType::all());
        });
        static::deleted(function($modeltype) {
            \Log::alert("cached modeltypes");
            \Cache::forever('modeltypes', ModelType::all());
        });
    }
    
    public function rows()
    {
        return $this->hasMany(ModelRow::class, 'model_type_id')->orderBy('order');
    }

    public function view_rows()
    {
        return $this->rows()->where('view', true);
    }

    public function groups()
    {
        return $this->hasMany(ModelRow::class, 'model_type_id')->select('group')->orderBy('group')->distinct();
    }
    /**
     * @param array $keys
     * @return void
     */
    public function exclude_from_details($keys)
    {
        return collect((array) $this->details)->filter(fn($value, $key) => !in_array($key, $keys))->toArray();
    }
    public function relations()
    {
        return $this->hasMany(ModelRelation::class, 'model_type_id');
    }
    public function getModel()
    {
        return app($this->model_class);
    }
    public function getRowsFromCache()
    {
        return collect(\Cache::get("modeltypes.{$this->getKey()}.rows", []));
    }
    public function get_route($method, $params = [])
    {
        return route("zeus.{$this->slug}.{$method}", $params);
    }
    public function get_api_route($method, $params = [])
    {
        return route("api.zeus.{$this->slug}.{$method}", $params);
    }
}