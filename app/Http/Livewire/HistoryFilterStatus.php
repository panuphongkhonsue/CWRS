<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;

class HistoryFilterStatus extends Component
{
    public $welfare = 999; 

    public function render()
    {
        return view('livewire.history-filter-status');
    }
   
    public function filter()
    {
        
        $this->emitTo('history-show','reload', $this->welfare);
       
    }
}
