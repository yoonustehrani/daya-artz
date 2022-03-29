<?php

namespace App\Http\Livewire\Zeus\ModelTypes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Zeus\Models\ModelRow;
use Zeus\Models\ModelType;

class Update extends Component
{
    public $rows;
    public ModelRow $newrow;
    public $groups;
    public $modeltype;
    public $types;
    protected $rules;
    public $v_options;
    public $relations;
    public function __construct()
    {
        $this->v_options = \ZeusPanel::getVisibilities();
        $rules = [
            'rows.*.title' => 'required|string',
            'rows.*.type' => 'required|string',
            'rows.*.dynamic' => 'nullable',
            'rows.*.default_value' => 'nullable|string',
            'rows.*.placeholder' => 'nullable|string',
            'rows.*.group' => 'nullable|string',
            // 'rows.*.rawdetails' => 'nullable|string',
            'rows.*.model_relation_id' => 'nullable|numeric',
            'rows.*.required' => 'nullable|string',
            'newrow.type' => 'nullable|string',
            'newrow.title' => 'nullable|string',
            'newrow.field' => 'nullable|string|min:2',
            'newrow.dynamic' => 'nullable',
        ];
        foreach ($this->v_options as $v) {
            $rules['rows.*.' . $v] = 'nullable';
            $rules['newrow.' . $v] = 'nullable';
        }
        $this->rules = $rules;
    }
    public function mount()
    {
        // $this->groups = $this->getGroups();
        $this->types = \ZeusPanel::getDataTypes();
        $this->newrow = new ModelRow();
        // dd($this->rows);
    }
    public function render()
    {
        return view('livewire.zeus.model-types.update');
    }
    public function getGroups()
    {
        $groups = DB::table(ModelRow::TABLE_PREFIX . 'model_rows')
        ->select('group as group_name')
        ->where('model_type_id', $this->modeltype)
        ->orderBy('group')
        ->distinct()
        ->get();
        return $groups->whereNotNull('group_name')->pluck('group_name');
    }
    public function save()
    {
        $this->validate();
        $count = 0;
        foreach ($this->rows as $row) {
            foreach ($this->v_options as $v) {
                $row->{$v} = $row->{$v} ? 1 : 0;
            }
            $row->model_relation_id = $row->model_relation_id ?: null;
            $row->required = $row->required ?: null;
            if ($row->isDirty()) {
                $row->save();
                $count++;
            }
        }
        \Cache::forever("modeltypes.{$this->modeltype}.rows", $this->rows);
        if ($count > 0) {
            session()->flash('message', __('zlang::modeltype.messages.items-updated', ['count' => $count]));
        } else {
            session()->flash('message', __('zlang::modeltype.messages.no-updates'));
        }
    }
    public function add_row()
    {
        $this->validate([
            'newrow.type' => 'required|string',
            'newrow.title' => 'required|string',
            'newrow.field' => 'required|string|min:2',
            'newrow.dynamic' => 'nullable',
            'newrow.relation' => 'nullable|numeric'
        ]);
        DB::transaction(function() {
            $modeltype = \ZeusPanel::getModelTypeById($this->modeltype);
            if ($modeltype) {
                $latest_id = $modeltype->rows()->reorder()->select('order')->orderBy('order', 'desc')->first();
                $recommended_id = $latest_id ? $latest_id->order + 1 : 0;
                $this->newrow->dynamic = request('newrow.dynamic') ? 1 : 0;
                $this->newrow->order = $recommended_id;
                foreach ($this->v_options as $v) {
                    $this->newrow->{$v} = $this->newrow->{$v} ? 1 : 0;
                }
                if ($new = $modeltype->rows()->save($this->newrow)) {
                    $this->rows->push($new);
                    $this->newrow = new ModelRow();
                }
            }
        });
    }
    public function remove_row($id)
    {
        $new_rows = $this->rows->filter(function($r) use($id) {
            if ($r->id === $id) {
                return ! $r->delete();
            }
            return true;
        });
        $this->rows = $new_rows;
    }
    public function move_down($id)
    {
        $row = $this->rows->firstWhere('id', $id);
        $next_row = $this->rows->filter(fn($r) => $r->order > $row->order)->first();
        $row->increment('order');
        $next_row->decrement('order');
    }
    public function move_up($id)
    {
        $row = $this->rows->firstWhere('id', $id);
        $prev_row = $this->rows->filter(fn($r) => $row->order > $r->order )->last();
        $row->decrement('order');
        $prev_row->increment('order');
    }
}
