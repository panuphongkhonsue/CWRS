<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;
use Livewire\WithPagination;

class RequestShow extends Component
{
    use WithPagination;
    public $status = 0;
    public $query;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        if ($this->status != 999) {
            return view('livewire.request-show', ['requests' => Single_request::where('status', $this->status)->orderby('id', 'desc')->paginate(10)]);
        }

        return view('livewire.request-show', ['requests' => Single_request::whereNot('status', -1)->orderby('id', 'desc')->paginate(10)]);
    }

    public function reload($status)
    {
        $this->resetPage();
        $this->status = $status;

    }
}
