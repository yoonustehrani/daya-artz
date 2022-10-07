<?php

namespace App\Http\Livewire\Zeus\ModelTypes;

use Livewire\Component;
use Zeus\Models\ModelRow;

class Create extends Component
{
    public $cols;
    public $rows;
    public $v_options;
    public $field_name;
    public function mount($cols)
    {
        $rows = [];
        $this->v_options = \ZeusPanel::getVisibilities();
        foreach ($cols as $col) {
            $row = new ModelRow;
            $row->field = $col['name'];
            $row->key = $col['name'] . \Str::random(8);
            $row->type = $col['input_type'];
            $row->title = \Str::ucfirst(str_replace('_', ' ', $col['name']));
            $row->details = $col['details'] ?? null;
            foreach ($this->v_options as $v) {
                $row->{$v} = $col['visibilities'][$v];
            }
            array_push($rows, $row->toArray());
        }
        $this->rows = $rows;
    }
    public function add_row()
    {
        $row = new ModelRow;
        $row->field = $this->field_name;
        $row->key = \Str::uuid();
        $row->type = 'text';
        $row->title = '';
        $row->browse = true;
        $row->view = true;
        $row->create = false;
        $row->edit = false;
        $row->trash = false;
        array_push($this->rows, $row->toArray());
    }
    public function remove_row($key)
    {
        $this->rows = collect($this->rows)->filter(fn($r) => $r['key'] !== $key);
    }
    public function render()
    {
        return view('livewire.zeus.model-types.create');
    }
}
