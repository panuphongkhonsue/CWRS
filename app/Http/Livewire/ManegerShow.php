<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Group_request;
use Livewire\WithPagination;

class ManegerShow extends Component
{
    use WithPagination;
    public $status = 2;
    public $manage_year = 999;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if ($this->status == 999 ) {
            return view('livewire.maneger-show', ['requests' => Group_request::whereNot('status', -2)->orderBy('id', 'desc')->paginate(10)]);
        }
        else {
            return view('livewire.maneger-show', ['requests' => Group_request::where('status', $this->status)->orderBy('id', 'desc')->paginate(10)]);
        }
    }
// whereYear('create_date', $this->walfare_year)->
    public function reload($status, $manage_year)
    {
        $this->status = $status;
        $this->manage_year = $manage_year;
        $this->resetPage();
    }

}
