<?php

namespace Zeus\View\Components;

use Illuminate\View\Component;

class GroupModelrows extends Component
{
    public $title;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $rows)
    {
        $this->title = $title;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('zview::components.forms.group');
    }
}
