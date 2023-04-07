<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Single_request;
use Livewire\WithPagination;

class ReportShow extends Component
{
    use WithPagination;
    public $report_status = 999;
    public $report_type = 999;
    public $report_year = 999;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        if ($this->status == 999) {
            return view('livewire.report-show', ['requests' => Single_request::where('user_id', Auth::user()->id)->paginate(10)]);
        }
        else {
            return view('livewire.report-show', ['requests' => Single_request::where('status', $this->status)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10)]);
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
