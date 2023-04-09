<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Single_request;
use Livewire\WithPagination;
use App\Models\Welfare;

class ReportShow extends Component
{
    use WithPagination;
    public $tb = 1;
    public $report_status = 1;
    public $report_type = "S";
    public $report_year = 999;
    public $year1;
    public $year2;
    public $year3;
    public $year4;
    public $year5;

    public $month;

    public $sum;

    public $requests;
    public $welfares;
    public $count_wel = 0;
    protected $listeners = ['reload'];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->welfares = Welfare::where('type', 'S')->get();

        foreach ($this->welfares as $index => $welfare) {
            $welId[$index] = $welfare->id;
            $this->count_wel++;
        }

        $this->requests = Single_request::where('status', 1);
        $this->requests = $this->requests->whereNotIn('id', $welId);

        $this->year1 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2023)->get();
        $this->year2 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2022)->get();
        $this->year3 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2021)->get();
        $this->year4 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2020)->get();
        $this->year5 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2019)->get();

        $this->requests = 1;
    }

    public function render()
    {
            return view('livewire.report-show');
    }

    public function reload($report_status, $report_type, $report_year)
    {
        $this->resetPage();
        $this->report_status = $report_status;
        $this->report_type = $report_type;
        $this->report_year = $report_year;

        if ($report_year == 999)
        {
            $this->tb = 1;
            $this->welfares = Welfare::where('type', 'S')->get();

            foreach ($this->welfares as $index => $welfare) {
                $welId[$index] = $welfare->id;
                $this->count_wel++;
            }

            $this->requests = Single_request::where('status', 1);
            $this->requests = $this->requests->whereNotIn('id', $welId);

            $this->year1 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2023)->get();

            $this->year2 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2022)->get();
            $this->year3 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2021)->get();
            $this->year4 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2020)->get();
            $this->year5 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2019)->get();

        }


        else if ($report_year != 999)
        {
            $this->tb = 2;
            $this->welfares = Welfare::where('type', 'S')->get();

            foreach ($this->welfares as $index => $welfare) {
                $welId[$index] = $welfare->id;
                $this->count_wel++;
            }

            $this->requests = Single_request::where('status', 1);
            $this->requests = $this->requests->whereNotIn('id', $welId);
            $this->requests = $this->requests->whereYear('create_date', $report_year)->get();

            for ($i = 0 ; $i < 12 ; $i++) {
                $this->month[$i] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereMonth('create_date', $i+1)->get();
                return dd()
            }

            $this->year2 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2022)->get();
            $this->year3 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2021)->get();
            $this->year4 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2020)->get();
            $this->year5 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2019)->get();

            $this->requests = 1;
        }
    }
}
