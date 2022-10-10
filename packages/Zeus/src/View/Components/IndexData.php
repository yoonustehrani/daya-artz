<?php

namespace Zeus\View\Components;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class IndexData extends Component
{
    public $row;
    public $value;
    public $attrs = ['copy' => false];
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($row, $value)
    {
        $this->row = $row;
        $this->value = $value;
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
        switch ($this->row->type) {
            case 'text':
            case 'email':
            case 'slug':
                $component = 'text';
                break;
            case 'number':
                $component = 'number';
                break;
            case 'price':
                $component = 'number';
                $this->value = number_format($this->value, config('zconfig.package.currency_decimals')) . " " . config('zconfig.package.curreny', '$');
                break;
            case 'select':
                $component = 'pill';
                break;
            case 'date':
            case 'datetime': 
                if ($this->value) {
                    $component = 'datetime';
                    $this->value = $this->get_datetime();
                } else {
                    $component = 'text';
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
                }
                break;
            case 'textarea':
                $component = 'text';
                $this->value = \Str::words($this->value, 10);
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
            return view('zview::components.index.' . $component)->with('attrs', $this->attrs);
        }
        return "<td>{$this->row->type} Not supported</td>";
    }
}
