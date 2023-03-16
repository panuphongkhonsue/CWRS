<?php

namespace App\Http\Controllers;

use App\Models\Welfare;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RequestController extends Controller
{
    //
    public function single_request()
    {
        $data['welfares'] = Welfare::all()->where('type', 'S');
        return view('employees.request', $data);
    }

    public function history()
    {
        return view('employees.history');
    }

    public function create_single(Request $request)
    {

        $welfare = Welfare::find($request->welfare);
        $user = Auth::user();
        $date = date("Y-m-d");
        $id = 15;

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/bills/', $name);
                $filename[] = $name;
            }
        }

        $value = [
            'create_date' => $date,
            'id' => $id,
            'bill' => json_encode($filename, JSON_UNESCAPED_UNICODE),
        ];

        $welfare->users_request()->attach($user, $value);

        return redirect()->route('history');
    }
}
