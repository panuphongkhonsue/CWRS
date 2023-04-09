<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Single_request;
use Illuminate\Support\Facades\DB;
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
        $this->welfares = Welfare::where('type', 'S')->orderBy('id')->get();

        foreach ($this->welfares as $index => $welfare) {
            $welId[$index] = $welfare->id;
            $this->count_wel++;
        }

        $this->requests = Single_request::where('status', 1);
        $this->requests = $this->requests->whereIn('welfare_id', $welId);

        $this->year1 = DB::table('welfares')->leftJoin('users_welfares', 'welfares.id', '=', 'users_welfares.welfare_id')->selectRaw('sum(welfare_budget) as sum')->where('welfares.type', 'S')->whereYear('users_welfares.create_date', 2023)->where('users_welfares.status', 1)->groupBy('welfares.id')->get();

/*         $this->year1 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2023)->orderBy('welfare_id')->get();*/
        $this->year2 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2022)->orderBy('welfare_id')->get();
        $this->year3 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2021)->orderBy('welfare_id')->get();
        $this->year4 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2020)->orderBy('welfare_id')->get();
        $this->year5 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2019)->orderBy('welfare_id')->get();

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
            $this->welfares = Welfare::where('type', $this->report_type)->orderBy('id')->get();

            foreach ($this->welfares as $index => $welfare) {
                $welId[$index] = $welfare->id;
                $this->count_wel++;
            }

            $this->requests = Single_request::where('status', $this->report_status);
            $this->requests = $this->requests->whereIn('welfare_id', $welId);

            $this->year1 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2023)->orderBy('welfare_id')->get();
            $this->year2 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2022)->orderBy('welfare_id')->get();
            $this->year3 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2021)->orderBy('welfare_id')->get();
            $this->year4 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2020)->orderBy('welfare_id')->get();
            $this->year5 = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', 2019)->orderBy('welfare_id')->get();

            $this->requests = 1;

        }


        else if ($report_year != 999)
        {
            $this->tb = 2;
            $this->welfares = Welfare::where('type', $this->report_type)->orderBy('id')->get();

            foreach ($this->welfares as $index => $welfare) {
                $welId[$index] = $welfare->id;
                $this->count_wel++;
            }

            $this->requests = Single_request::where('status', $this->report_status);
            $this->requests = $this->requests->whereNotIn('id', $welId);

            $this->month[0] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 1)->get();
            $this->month[1] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 2)->get();
            $this->month[2] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 3)->get();
            $this->month[3] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 4)->get();
            $this->month[4] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 5)->get();
            $this->month[5] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 6)->get();
            $this->month[6] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 7)->get();
            $this->month[7] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 8)->get();
            $this->month[8] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 9)->get();
            $this->month[9] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 10)->get();
            $this->month[10] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 11)->get();
            $this->month[11] = $this->requests->groupBy('welfare_id')->selectRaw('sum(welfare_budget) as sum')->whereYear('create_date', $report_year)->whereMonth('create_date', 12)->get();

            $this->requests = 1;
        }
    }
}
