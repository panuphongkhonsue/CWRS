<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Single_request;

class ReportFilter extends Component
{
    public $report_status = 1;
    public $report_type = "S";
    public $report_year = 999;

    public function render()
    {
        return view('livewire.report-filter');
    }

    public function filter()
    {
        $this->emitTo('request-show', 'reload', $this->report_status,$this->report_type,$this->report_year);
    }
}
