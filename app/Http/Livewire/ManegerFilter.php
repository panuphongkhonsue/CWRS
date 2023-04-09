<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ManegerFilter extends Component
{
    public $status = 999;
    public $manage_year = 999;

    public function render()
    {
        return view('livewire.maneger-filter');
    }

    public function filter()
    {

        $this->emitTo('maneger-show','reload', $this->status, $this->manage_year);
    }
}