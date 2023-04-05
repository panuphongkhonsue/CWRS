<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;
use Livewire\WithPagination;

class HistoryShow extends Component
{
    use WithPagination;
    public $status = 999;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        
        if ($this->status == 999) {
            return view('livewire.history-show', ['requests' => Single_request::whereNot('status')->paginate(10)]);
        }
        else {
            return view('livewire.history-show', ['requests' => Single_request::where('status', $this->status)->paginate(10)]);
        }
    }

    public function reload($status)
    {
        $this->resetPage();
        $this->status = $status;
    }
}
