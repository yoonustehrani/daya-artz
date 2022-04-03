<?php

namespace Zeus\View\Components;

use Illuminate\View\Component;

class SettingField extends Component
{
    public $setting;
    public $attrs = [];
    public $label = true;
    public $value;
    public $required = '';

    public function __construct($setting)
    {
        $this->setting = $setting;
    }
    /**
     * @return string|null
     */
    public function guess_component()
    {
        $component = null;
        $this->attrs['name'] = "settings[{$this->setting->key}]";
        $this->attrs['id'] = $this->setting->key;
        switch ($this->setting->type) {
            case 'text':
            case 'string':
                $component = 'input';
                $this->attrs['type'] = 'text';
                $this->value = $this->setting->value;
                break;
            case 'html':
            case 'textarea':
            case 'longtext':
                $component = 'textarea';
                $this->value = $this->setting->value;
                break;
            case 'file':
                $component = 'file-picker';
                $this->value = $this->setting->value;
                break;
        }

        return $component;
    }
    public function render()
    {
        $component = $this->guess_component();
        if ($component) {
            return view('zview::components.forms.' . $component)->with('row', $this->setting)->with('attrs', $this->attrs);
        }
        return "<p>setting component was not found for `{$this->setting->title}`</p>";
    }
}