<?php

namespace Zeus\Models;

use Zeus\Traits\HasDetailsAttribute;

class ModelRelation extends BaseModel
{
    use HasDetailsAttribute;
    protected $table = self::TABLE_PREFIX . 'model_relations';
    public $timestamps = false;
    public function row()
    {
        return $this->hasOne(ModelRow::class);
    }
    public function getModelType()
    {
        return \ZeusPanel::getModelTypeByModel($this->target_model);
    }
    public function getRelatedRows($type = null)
    {
        if (\Cache::has("modeltypes.{$this->getModelType()->getKey()}.rows")) {
            $rows = \Cache::get("modeltypes.{$this->getModelType()->getKey()}.rows");
            return $type ? collect($rows)->where($type, 1)->values() : $rows;
        }
        return [];
    }
    public function target()
    {
        return $this->belongsTo(ModelType::class, 'target_model_type');
    }
}