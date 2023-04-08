<?php

namespace App\Http\Controllers;

use App\Models\Group_request;
use App\Models\Single_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Manage_request_controller extends Controller
{
    public function index()
    {
        $requests = Single_request::where('status', 0)->get();
        // Check for search input
        return view('v_manage_request', ['requests' => $requests]);
    }

    public function confirm_request($id, Request $request)
    {
        $requests = Single_request::where('id', $id)->first();

        if ($request->dec == "accept") {
            $requests->status = 1;
        } else if ($request->dec == 'reject') {
            $requests->status = -2;
        }

        $month = date("m");
        $year = date("Y") + 543;
        $day = date("d");
        $str = $year . '/' . $month . '/' . $day;
        $date = date("Y-m-d", strtotime($str));

        $requests->note = $request->note;
        $requests->hr_approve_date = $date;
        $requests->hr_approver_id = Auth::user()->id;
        $requests->save();

        sleep(1);

        return redirect()->route('manage_request');
    }

    public function headindex()
    {
        $requests = Group_request::where('status', 0)->orderBy('id', 'desc');

        if (!$requests) {
            return view('leaders.v_leader_home')->with('message', '--- ไม่มีรายการคำขอที่รอรับรอง ---');
        }

        return view('leaders.v_leader_home', ['requests' => $requests]);
    }
}
