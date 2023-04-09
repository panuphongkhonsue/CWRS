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
    public $requests;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->requests = Single_request::where('status', 0)->get();
    }

    public function render()
    {
        return view('livewire.request-show');
    }

    public function reload($status)
    {
        $this->resetPage();
        $this->status = $status;
        $this->requests = Single_request::query();

        if ($this->status != 999) {
            $this->requests = $this->requests->where('status', $this->status)->get();
        }else{
            $this->requests = $this->requests->whereNot('status', -1)->get();
        }


    }

    public function query()
    {
        $this->reload($this->status);
    }

}
