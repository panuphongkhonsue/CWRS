<?php

namespace App\Http\Livewire;

use App\Models\Single_request;
use Livewire\Component;

class ShowRequests extends Component
{
    public $requests;

    public function mount()
    {
        $this->requests = Single_request::get();
    }

    public function render()
    {
        return view('livewire.show-requests');
    }
}
