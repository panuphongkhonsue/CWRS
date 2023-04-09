<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;
use Livewire\WithPagination;

class RequestShow extends Component
{
    use WithPagination;
    public $status = 0;
    public $mange_type = 999;
    public $manage_year = 999;
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

    public function reload($status,$manage_type,$manage_year)
    {
        $this->resetPage();
        if($status==999&&($manage_year!=999||$manage_type!=999)){
            $this->mange_type = $manage_type;
            $this->manage_year = $manage_year;
        }else{
            $this->status = $status;
        }
        $this->requests = Single_request::query();

        if ($this->status != 999) {
            $this->requests = $this->requests->where('status', $this->status)->get();
        }else{
            $this->requests = $this->requests->whereNot('status', -1)->get();
        }


    }



}
