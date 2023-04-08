<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;

class RequestFilter extends Component
{
    public $req_status;

    public function filter($status)
    {
        $this->req_status = $status;
        $this->emitTo('request-show', 'reload', $this->req_status);
    }
}
