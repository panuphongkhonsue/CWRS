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
        $requests = Single_request::orderBy('id', 'desc')->paginate(10);



        return view('v_manage_request', ['requests' => $requests]);
    }
}
