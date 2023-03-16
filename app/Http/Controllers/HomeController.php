<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function home()
    {
        if (Auth::check())
        {
            if (Auth::user()->type == "E")
            {
                return view('employees.empindex');
            }

            else if (Auth::user()->type == "M")
            {
                return view('leaders.headindex');
            }

            else if (Auth::user()->type == "H")
            {
                return view('humanresources.hrindex');
            }
        }
    }
}
