<?php

namespace Zeus\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class ViewData extends Component
{
    public $row;
    public $data;
    public $value;
    public $relation;
    // public $relation_key;
    public $attrs = ['copy' => false];
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($row, $data)
    {
        $this->row = $row;
        $this->data = $data;
        $this->relation = $row->relation;
        if (is_null($this->relation)) {
            $this->value = $data->{$row->field};
        } else {
            $this->value = __('unset');
        }
    }
    /**
     * @return Carbon
     */
    protected function get_datetime()
    {
        if (! $this->value instanceof Carbon) {
            $this->value = Carbon::rawParse($this->value)->setTimezone('Asia/Tehran');
        }
        return $this->value;
    }
    protected function guess_desired_view()
    {
        $component = null;
        if ($this->relation) {
            switch ($this->relation->type) {
                case 'belongsTo':
                    $component = 'pill';
                    $relation = $this->data->{$this->relation->local_method};
                    if ($relation) {
                        $this->value = $relation->as_text;
                        $this->attrs['href'] = $this->relation->target->get_route('show', ['id' => $relation->getKey()]);
                    }
                    $this->attrs['class'] = "pill bg-gray-100 mx-2 py-1";
                    break;
                case 'belongsToMany':
                    $component = 'pills';
                    $data = $this->data->{$this->row->relation->local_method}->append('as_text');
                    $this->attrs['class'] = "pill bg-gray-100 mx-2 py-1";
                    if ($data) {
                        $data = $data->map(function($d) {
                            return [
                                'value' => $d->as_text,
                                'key' => $d->getKey()
                            ];
                        });
                    }
                    $this->value = $data ?: [];
                    break;
            }
            return $component;
        }
        switch ($this->row->type) {
            case 'text':
            case 'email':
            case 'slug':
                $component = 'text';
                $this->attrs['copy'] = true;
                break;
            case 'textarea':
                $component = 'textarea';
                break;
            case 'number':
                $component = 'pill';
                $this->attrs['class'] = "pill bg-mango-light mx-2 py-1";
                break;
            case 'radio':
            case 'select':
                $component = 'pill';
                $this->attrs['class'] = "pill bg-green-600/50 mx-2 py-1";
                break;
            case 'datetime':
            case 'date':
                if ($this->value) {
                    $component = 'datetime';
                    $this->value = $this->get_datetime();
                    \Log::alert($this->value);
                } else {
                    $component = 'pill';
                    $this->value = __('unset');
                    $this->attrs['class'] = "pill bg-gray-100/50 text-gray-400 cursor-not-allowed mx-2 py-1";
                }
                break;
            case 'checkbox':
                $component = 'boolean';
                break;
            case 'file':
                if ($this->value) {
                    $component = 'file';
                    $this->attrs['type'] = 'image';
                } else {
                    $component = 'text';
                    $this->value = __('empty');
                }
                break;
            case 'richtext':
                $component = 'richtext';
                break;
        }
        return $component;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $component = $this->guess_desired_view();
        if ($component) {
            return view('zview::components.show.' . $component)->with('attrs', $this->attrs);
        }
        return "<p>{$this->row->type} Not supported</p>";
    }
}
