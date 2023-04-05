<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterWelfare extends Component
{
    public $type;
    public function render()
    {
        return view('livewire.filter-welfare');
    }

    public function filter()
    {
        $this->emitTo('show-welfare', 'reload', $this->type);
    }
}
