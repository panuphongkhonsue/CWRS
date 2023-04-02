<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Welfare;

class Welfare_controller extends Controller
{
    public function index()
    {
        $welfares = Welfare::all();

        return view('v_manage_welfare', ['welfares' => $welfares]);
    }
}
