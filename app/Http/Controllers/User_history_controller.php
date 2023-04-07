<?php /*
* User_history_controller
* User_history_controller handle user history event
* @author : Rawich Piboonsin 64160299
* @Create Date : 2023-03-11
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Welfare;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Single_request;
use Illuminate\Support\Facades\DB;

class User_history_controller extends Controller
{
    /*
    * index()
    * แสดงประวัติการยื่นคำขอของผู้ใช้ทั้งหมด
    * @input :
    * @output : รายการคำขอของผู้ใช้
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-11
    */
    public function index()
    {
        $requests = Single_request::where('user_id', Auth::user()->id)->orderBy('create_date', 'desc');

        return view('v_history', ['requests' => $requests]);
    }

    /*
    * show($id)
    * แสดงรายละเอียดคำขอตามรหัสคำขอ
    * @input : id
    * @output : history
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-15
    */
    public function show_request($id)
    {
        $history = Single_request::where('id', $id)->first();

        if ($history == NULL) {
            abort(404);
        }

        return view('v_show_history', ['history' => $history]);
    }

    /*
    * cancel($id)
    * ยกเลิกคำขอตามรหัสคำขอ
    * @input : id
    * @output : history
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-15
    */
    public function cancel($id, Request $request)
    {
        $month = date("m");
        $year = date("Y") + 543;
        $day = date("d");
        $str = $year . '/' . $month . '/' . $day;
        $date = date("Y-m-d", strtotime($str));

        $requests = Single_request::where('id', $id)->first();
        $requests->status = -1;
        $requests->hr_approve_date = $date;
        $requests->save();

        return redirect()->route('history');
    }

    public function show_approve($id)
    {
        $history = Single_request::where('id', $id)->first();

        if ($history == NULL) {
            abort(404);
        }

        return view('v_show_approve', ['history' => $history]);
    }
}
