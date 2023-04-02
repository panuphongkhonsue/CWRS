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

    public function approve_request($id)
    {
        DB::update(
            'UPDATE users_welfares SET status=? WHERE id=?',
            [
                1, $id
            ]);

        return redirect()->route('manage_request');
    }

    public function reject_request($id)
    {
        DB::update(
            'UPDATE users_welfares SET status=? WHERE id=?',
            [
                -2, $id
            ]);

        return redirect()->route('manage_request');
    }
}
