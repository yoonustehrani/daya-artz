<?php

namespace Zeus\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RelationFormField extends Component
{
    public $row;
    public $relation;
    public $modeltype;
    public $value = null;
    public $attrs = [];
    public $options;
    public $target_model;

    public function __construct($row, $modeltype, $data = null)
    {
        $this->row = $row;
        $this->modeltype = $modeltype;
        // $this->value = $data;
        if ($data && $data->{$row->relation->local_method}) {   
            if ($data->{$row->relation->local_method} instanceof Collection) {
                $this->value = $data->{$row->relation->local_method}->append('as_text')->map(fn($r) => $r->only(['id', 'as_text']));
            } else {
                $this->value = optional($data->{$row->relation->local_method})->getKey();
            }
        }
        $this->relation = $row->relation;
        // $model_class = $this->relation->target->model_class;
        // if ($data && $this->relation->target_model === $this->modeltype->model_class) {
        //     $model = $model->where('id', '<>', $data->getKey());
        // }
        // $this->target_model = \ZeusPanel::getModel($model_class);
    }

    protected function relation_target_is_one()
    {
        return in_array($this->relation->type, ['belongsTo', 'morphOne']);
    }
    protected function safe_route($route)
    {
        try {
            return route($route);
        } catch(\Exception $e) {
            return null;
        }
    }
    public function get_template()
    {
        $component = null;
        switch ($this->relation->type) {
            case 'belongsTo':
                $component = 'dynamic-selectbox';
                $this->attrs['data-index-api'] = $this->relation->target->get_api_route('index');
                $this->attrs['data-create-api'] = $this->relation->target->get_route('create', ['after' => request()->route()->getName()]);
                $this->attrs['data-target-input'] = $this->row->field;
                break;
            case 'belongsToMany':
                $component = 'dynamic-multi-select';
                $this->attrs['data-index-api'] = $this->relation->target->get_api_route('index');
                break;
            case 'hasMany':
                if ($this->relation->getModelType()) {
                    $component = 'relations.inline-form';
                    $this->attrs['except'] = [$this->modeltype->getModel()->{$this->relation->local_method}()->getForeignKeyName()];
                }
                break;
        }
        return $component;
    }
    public function render()
    {
        if ($component = $this->get_template()) {
            return view('zview::components.forms.' . $component, array_merge(['attrs' => $this->attrs]));
        }
        return "<p class='p-3'>" . __('Unsupported relation Type') . "</p>";
    }
}