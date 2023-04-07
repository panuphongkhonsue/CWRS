<?php /*
* Request_controller
* Request_controller handle request event
* @author : Rawich Piboonsin 64160299
* @Create Date : 2023-03-15
*/

namespace App\Http\Controllers;

use App\Models\Welfare;
use App\Models\Bill;
use App\Models\Single_request;
use Illuminate\Http\RedirectResponse;
use App\Models\Group_request;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Request_controller extends Controller
{
    /*
    * single_request()
    * แสดงหน้าจอเบิกสวัสดิการแบบเดี่ยว
    * @input : -
    * @output : ข้อมูลสวัสดิการแบบเดี่ยว
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-15
    *
    */
    public function single_request()
    {
        $user = Auth::user();
        $requests = Single_request::where('user_id', $user->id)->get();

        $welfare_id = NULL;

        foreach ($requests as $index => $request) {
            if (date("Y", strtotime($request->create_date)) == date("Y")
                && ($request->status >= 0)) {
                $welfare_id[$index] = $request->welfare_id;
            }
        }

        $data = Welfare::where('type', 'S')->get();

        if ($welfare_id != NULL) {
            $data = Welfare::where('type', 'S')->whereNotIn('id', $welfare_id)->get();
        }

        return view('v_request', ['welfares' => $data],);
    }


    /*
    * create_single()
    * สร้างคำขอเบิกสวัสดิการแบบเดียว
    * @input : -
    * @output : หน้าจอประวัติการเบิกสวัสดิการ
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-15
    */
    public function create_single(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'filename' => 'required'
        ]);

        $json = json_decode($request->welfare);
        $welfare = Welfare::find($json->id);
        $user = Auth::user();

        $month = date("m");
        $year = date("Y") + 543;
        $day = date("d");
        $str = $year . $month . $day;
        $date = strtotime($str);

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/bills/', $name);
                $filename[] = $name;
            }
        }

        $total = array_sum($request->price);

        $value = [
            'create_date' => $date,
            'bill' => json_encode($filename, JSON_UNESCAPED_UNICODE),
            'item' => json_encode($request->item, JSON_UNESCAPED_UNICODE),
            'price' => json_encode($request->price, JSON_UNESCAPED_UNICODE),
            'welfare_budget' => $welfare->budget,
            'total_price' => $total,
            'welfare_name' => $welfare->title
        ];

        $welfare->users_request()->attach($user, $value);

        return redirect()->route('history');
    }

    /*
    * group_request()
    * แสดงหน้าจอเบิกสวัสดิการแบบบุคคล
    * @input : -
    * @output : หน้าจอประวัติการเบิกสวัสดิการ
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-15
    * @Update Date : 2023-04-05 Panuphong Khonsue 64160282 call data to show
    * @Update Date : 2023-04-06 Panuphong Khonsue 64160282 Query Data To Show in Table
    */
    public function group_request()
    {

        $user = Auth::user();
        $requests = Group_request::where('user_id', $user->id)->get();
        $department_user = User::where('department_id', $user->department_id)->get();
        $welfare_id[0] = NULL;

        foreach ($requests as $index => $request) {
            if (date("Y", strtotime($request->create_date)) == date("Y")) {
                $welfare_id[$index] = $request->welfare_id;
            }
        }

        $data = Welfare::where('type', 'G')->get();

        if ($welfare_id[0] != NULL) {
            $data = Welfare::where('type', 'G')->whereNotIn('id', $welfare_id)->get();
        }



        return view('v_group_request', ['welfares' => $data],['departments_user'=> $department_user]);
    }

    public function create_group(Request $request){


        return redirect()->route('history');
    }

}
