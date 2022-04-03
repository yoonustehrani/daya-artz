<?php

namespace Zeus\View\Components;

use Illuminate\View\Component;

class IndexRelation extends Component
{
    public $relation;
    public $relation_model;
    public $relation_key;
    public $modeltype;
    public $value = null;
    public $item;
    public $attrs = ['copy' => false];

    public function __construct($row, $item, $modeltype, $slug)
    {
        $this->row = $row;
        $this->item = $item;
        $this->slug = $slug;
        $this->modeltype = $modeltype;
        if ($row->relation) {
            $relation_key = $row->relation->local_method ?? $row->field;
            $this->relation = $this->relation_target_is_one() ? $item->{$relation_key} : $item->{$relation_key . '_count'};
            $this->relation_model = \ZeusPanel::getModel($row->relation->target->model_class);
            // $this->relation_model = \ZeusPanel::getModelTypeByModel($row->relation->target_model);
            if ($row->relation->type === 'hasMany') {
                $this->relation_key = $item->{$row->relation->local_method}()->getForeignKeyName();
            }
        }
    }

    protected function guess_desired_view()
    {
        $component = null;
        $this->attrs['href'] = '#';
        $this->value = __('unset');
        if ($this->relation_target_is_one()) {
            $component = 'pill';
            if ($this->relation_model && $this->relation) {
                $this->value = $this->relation->as_text;
                $this->attrs['href'] = $this->row->relation->target->get_route('show', ['id' => $this->relation]);
            }
        } else {
            $component = 'pill';
            if ($this->relation_model && $this->relation_key) {
                $this->attrs['href'] = $this->modeltype->get_route($this->row->relation->local_method, ['id' => $this->item->getKey()]);
            } else if ($this->row->relation->type === 'belongsToMany') {
                $this->attrs['href'] = $this->modeltype->get_route($this->row->relation->local_method, ['id' => $this->item->getKey()]);
            }
            $this->value = $this->relation;
        }
        return $component;
    }

    protected function relation_target_is_one()
    {
        return in_array($this->row->relation->type, ['belongsTo', 'hasOne', 'morphOne']);
    }

    public function render()
    {
        $component = $this->guess_desired_view();
        if ($component) {
            return view('zview::components.index.' . $component)->with('attrs', $this->attrs);
        }
        return "<td>{$this->row->type} Not supported</td>";
    }
}