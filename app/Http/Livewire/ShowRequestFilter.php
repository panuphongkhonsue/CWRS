<?php

namespace App\Http\Livewire;

use App\Models\Single_request;
use Livewire\Component;

class ShowRequestFilter extends Component
{
    public $req_type;
    public $query;

    public function render()
    {
        return view('livewire.show-request-filter');
    }

    public function filter()
    {
        
    }
}
