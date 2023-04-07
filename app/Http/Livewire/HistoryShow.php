<?php

namespace App\Http\Livewire;

use App\Models\Group_request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Single_request;
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

        if ($this->status == 999) {
            return view('livewire.history-show', ['requests' => Single_request::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10)]);
        }

        else if ($this->walfare_year != 999) {
            return view('livewire.history-show', ['requests' => Group_request::where('user_id', Auth::user()->id)]);
        }

        else {
            return view('livewire.history-show', ['requests' => Single_request::where('status', $this->status)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10)]);
        }
    }
// whereYear('create_date', $this->walfare_year)->
    public function reload($status, $walfare_type, $walfare_year)
    {
        $this->resetPage();
        $this->status = $status;
        $this->walfare_type = $walfare_type;
        $this->walfare_year = $walfare_year;
    }
}
