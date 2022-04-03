<?php

namespace Zeus\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class FormField extends Component
{
    public $row;
    public $value;
    public $data = [];
    public $required;
    public $attrs = [];
    public $label = true;

    public function __construct($row, $value = null, $label = true, $nameprefix = null, $method = 'create')
    {
        $this->row = $row;
        $this->value = $value ?? $row->default_value;
        $this->required = $row->isRequiredFor($method);
        $this->label = $label;
        $this->attrs['name'] = $nameprefix ? "{$nameprefix}[{$row->field}]" : $row->field;
    }
    protected function prepareOptions()
    {
        $options = optional($this->row->details)->choices;
        if (is_array($options) && isset($options[0])) {
            $opts = [];
            foreach ($options as $opt) {
                $opts[$opt] = \Str::ucfirst($opt);
            }
            $options = $opts;
        }
        return $options;
    }
    protected function getTemplate()
    {
        $types = \ZeusPanel::getDataTypeKeys();

        $component = null;
        if ($this->required) {
            $this->attrs['required'] = true;
        }
        if (in_array($this->row->type, $types)) {
            switch ($this->row->type) {
                case 'text':
                case 'email':
                    $component = 'input';
                    $this->attrs['type'] = $this->row->type;
                    break;
                case 'number':
                    $component = 'input';
                    foreach (['type' => 'number',  'min' => '0', 'max' => '', 'step' => '1'] as $k => $v) {
                        $this->attrs[$k] = $v;
                    }
                    break;
                case 'price':
                    $component = 'input';
                    $this->attrs['type'] = 'text';
                    $this->attrs['data-price-input'] = '';
                    break;
                case 'slug':
                    $component = 'input';
                    $this->attrs['type'] = 'text';
                    $from = optional($this->row->details)->from;
                    if ($from) {
                        $this->attrs['additional_class'] = 'slug-input';
                        $this->attrs['data-slug-from'] = $from;
                    }
                    break;
                case 'select':
                case 'radio':
                    $component = $this->row->type;
                    $this->data = ['options' => $this->prepareOptions()];
                    break;
                case 'date':
                case 'datetime':
                    $component = 'date-picker';
                    if ($this->value) {
                        if (! $this->value instanceof Carbon) {
                            $this->value = Carbon::rawParse($this->value, 'Asia/Tehran')
                            ->setTimezone('Asia/Tehran');
                        }
                        $this->value = optional($this->value)->timestamp;
                    }
                    $this->data = ['timepicker' => $this->row->type === 'datetime'];
                    break;
                case 'richtext':
                    $component = 'tinymce-editor';
                    break;
                case 'file':
                    $component = 'file-picker';
                    break;
                // case 'json':
                //     break;
                default:
                    $component = $this->row->type;
                    break;
            }
        }
        return $component;
    }

    public function render()
    {
        if ($component = $this->getTemplate()) {
            return view('zview::components.forms.' . $component, array_merge($this->data, ['attrs' => $this->attrs]));
        }
        return "<p class='p-3'>" . __('Unsupported Type') . "</p>";
    }
}