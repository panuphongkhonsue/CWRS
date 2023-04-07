<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Welfare;
use Illuminate\Support\Facades\Auth;

class Welfare_controller extends Controller
{
    public function index()
    {

        return view('v_manage_welfare');
    }

    public function add_welfare(Request $request)
    {
        Welfare::create([
            'title' => $request->title,
            'type' => $request->type,
            'budget' => $request->budget,
            'creator_id' => Auth::user()->id
        ]);

        return redirect()->route('manage_welfare');
    }

    public function edit_welfare(Request $request)
    {
        $welfare = Welfare::where('id', $request->e_id)->first();
        $welfare->title = $request->e_title;
        $welfare->budget = $request->e_budget;
        $welfare->save();

        return redirect()->route('manage_welfare');
    }
}
