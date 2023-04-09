<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Single_request;
use Livewire\WithPagination;
use App\Models\Group_request;

class HistoryShow extends Component
{
    use WithPagination;
    public $status = 999;
    public $walfare_type = 999;
    public $walfare_year = 999;
    public $requests;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $single = Single_request::where('user_id', Auth::user()->id)
                    ->select('id','status', 'create_date', 'total_price', 'welfare_name', 'welfare_id');

        $this->requests = Group_request::where('user_id', Auth::user()->id)
                    ->select('id','status', 'create_date', 'total_price', 'welfare_name', 'welfare_id')
                    ->union($single)->orderBy('id', 'desc')->get();

    }

    public function render()
    {

        if ($this->status == 999 ) {
            return view('livewire.history-show', ['requests' => $this->requests]);
        }
        else {
            return view('livewire.history-show', ['requests' => Single_request::where('status', $this->status)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10)]);
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
