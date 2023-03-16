<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Welfare;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserHistoryController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $requests = $user->welfares_request;

        return view('employees.history', ['requests' => $requests]);
    }

    public function show($id)
    {
        $history = DB::table('user_welfare')->where('id', $id)->first();

        return view('v_show_history', ['history' => $history]);
    }
    
    public function cancel($id)
    {

        DB::update(
            'UPDATE user_welfare SET status=? WHERE id=?',
            [
                -1, $id
            ]);

        return redirect()->route('history');
    }
}
