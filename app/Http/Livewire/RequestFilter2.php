<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequestFilter2 extends Component
{
    public $status = 999;
    public $manage_type = 999;
    public $manage_year = 999;

    public function render()
    {
        return view('livewire.request-filter2');
    }

    public function filter()
    {

        $this->emitTo('request-show','reload', $this->status, $this->manage_type, $this->manage_year);
    }
}
