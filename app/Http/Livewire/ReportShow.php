<?php

namespace App\Http\Livewire;
use App\Models\Single_request;
use Livewire\WithPagination;

use Livewire\Component;

class ReportShow extends Component
{
    use WithPagination;
    public $report_status = 1;
    public $report_type = "S";
    public $report_year = 999;

    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if ($this->report_status == 1) {
            return view('livewire.report-show', ['requests' => Single_request::where('status', 1)->paginate(10)]);
        }
        else {
            return view('livewire.report-show', ['requests' => Single_request::where('status', 0)->paginate(10)]);
        }
    }

    public function reload($report_status, $report_type, $report_year)
    {
        $this->resetPage();
        $this->report_status = $report_status;
        $this->report_type = $report_type;
        $this->report_year = $report_year;
    }
}
