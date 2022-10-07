<?php

namespace App\Http\Livewire\Zeus\ModelTypes;

use Livewire\Component;

class Row extends Component
{
    public $index;
    public $row;
    public $v_options;
    public function render()
    {
        return view('livewire.zeus.model-types.row');
    }
}
