<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Single_request;
use App\Models\Group_request;
use Livewire\WithPagination;

class HistoryShow extends Component
{
    use WithPagination;
    public $status = 999;
    public $walfare_type = 999;
    public $walfare_year = 999;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $single = Group_request::where('user_id', Auth::user()->id)->select('id', 'status', 'create_date', 'total_price', 'welfare_name', 'welfare_id');

        $requests = Single_request::where('user_id', Auth::user()->id)->select('id', 'status', 'create_date', 'total_price', 'welfare_name', 'welfare_id')->union($single);

        if ($this->status == 999 ) {
            return view('livewire.history-show', ['requests' => $requests->get()]);
        }
        else {
            return view('livewire.history-show', ['requests' => $requests->where('status', $this->status)->get()]);
        }
    }
// whereYear('create_date', $this->walfare_year)->
    public function reload($status, $walfare_type, $walfare_year)
    {
        $this->status = $status;
        $this->walfare_type = $walfare_type;
        $this->walfare_year = $walfare_year;
        $this->resetPage();
    }
}
