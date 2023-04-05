<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;

class HistoryFilterStatus extends Component
{
    public $emp_status = 999;
    public $walfare_type = 999;
    public $walfare_year = 999;

    public function render()
    {
        return view('livewire.history-filter-status');
    }

    public function filter()
    {

        $this->emitTo('history-show','reload', $this->emp_status, $this->walfare_type, $this->walfare_year);
    }
}
