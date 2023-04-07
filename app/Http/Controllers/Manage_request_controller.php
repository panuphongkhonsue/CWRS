<?php

namespace App\Http\Controllers;

use App\Models\Single_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Manage_request_controller extends Controller
{
    public function index()
    {
        $requests = Single_request::where('status', 0)->orderBy('id', 'desc')->paginate(10);

        return view('v_manage_request', ['requests' => $requests]);
    }

    public function confirm_request($id, Request $request)
    {
        $requests = Single_request::where('id', $id)->first();

        if ($request->dec == "accept") {
            $requests->status = 1;
        }
        else if ($request->dec == 'reject') {
            $requests->status = -2;
        }

        $requests->note = $request->note;
        $requests->hr_approve_date = date("Y-m-d");
        $requests->hr_approver_id = Auth::user()->id;
        $requests->save();

        return redirect()->route('manage_request');
    }
}
