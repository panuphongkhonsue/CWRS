<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;

class RequestFilter extends Component
{
    public $req_status;

    public $countAll;
    public $countWait;
    public $countApp;
    public $countRej;

    public function mount()
    {
        $this->countAll = Single_request::whereNot('status', -1)->get()->count();
        $this->countWait = Single_request::where('status', 0)->get()->count();
        $this->countApp = Single_request::where('status', 1)->get()->count();
        $this->countRej = Single_request::where('status', -2)->get()->count();
    }

    public function render()
    {
        return view('livewire.request-filter');
    }

    public function filter($status)
    {
        $this->req_status = $status;
        $this->emitTo('request-show', 'reload', $this->req_status);
    }
}
