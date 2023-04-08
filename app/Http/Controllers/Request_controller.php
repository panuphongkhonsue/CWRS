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
use App\Models\Group_request;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User_group_welfare;


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

        $welfare_id[0] = NULL;

        foreach ($requests as $index => $request) {
            if (date("Y", strtotime($request->create_date)) == date("Y")) {
                $welfare_id[$index] = $request->welfare_id;
            }
        }

        $data = Welfare::where('type', 'S')->get();

        if ($welfare_id[0] != NULL) {
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
    public function create_single(Request $request)
    {
        $welfare = Welfare::find($request->welfare);
        $user = Auth::user();
        $date = date("Y-m-d");

        if ($request->hasfile('filename')) {
            foreach ($request->file('filename') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/bills/', $name);
                $filename[] = $name;
            }
        }

        $value = [
            'create_date' => $date,
            'bill' => json_encode($filename, JSON_UNESCAPED_UNICODE),
            'item' => json_encode($request->item, JSON_UNESCAPED_UNICODE),
            'price' => json_encode($request->price, JSON_UNESCAPED_UNICODE)
        ];

        $welfare->users_request()->attach($user, $value);

        return redirect()->route('history');
    }

    /*
    * group_request()
    * แสดงหน้าจอเบิกสวัสดิการแบบสันทนาการ
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

    /*
    * group_request()
    * แสดงหน้าจอเบิกสวัสดิการแบบสันทนาการ
    * @input : User Info, Welfare Info , Member, Total Price , Total People
    * @output : หน้าจอประวัติการเบิกสวัสดิการ
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-15
    * @Update Date : 2023-04-05 Panuphong Khonsue 64160282 call data to show
    * @Update Date : 2023-04-06 Panuphong Khonsue 64160282 Query Data To Show in Table
    * @Update Date : 2023-04-08 Panuphong Khonsue 64160282 GetValue to save in DataBase
    * @Update Date : 2023-04-08 Sarun Reaungthai 64160288 GetValue to save in DataBase
    */
    public function create_group(Request $request){
        $user = Auth::user();
        $date = date("Y-m-d");
        $selected_user_id = $request->input('get_user_id'); // get the value of the input field
        $welfare_obj1 = json_decode($request->welfare);

        $user_id = explode(',', $request->get_user_id[0]);
        $welfareBudget = $welfare_obj1->budget;
        $welfareObj2 = json_decode($request->welfare);
        $welfareId = $welfareObj2->id;
        $welfareTotal = $request->total_money;
        $welfareName = Welfare::where('id', $welfareId)->first();

        /*return dd($request->emp_id);*/
        // Retrieve the input values from the form
        $group_sumMoney = $request->input('sum-money');
        $group_welfare = $request->input('welfare');

        // Create a new group instance using the Eloquent model

        $group = new Group_request;
        if($user->type == "E"){
            $group->status = 2;
        }
        $group->user_id = $user->id;
        $group->create_date = $date;
        $group->total_price = $group_sumMoney;
        $group->welfare_budget = $welfareBudget;
        $group->welfare_id = $welfareId;
        $group->total_price = (str_replace(",","",$welfareTotal));
        $group->welfare_name = $welfareName->title;
        $group->save();
        // Redirect to the history route after creating the group

        
        foreach($user_id as $index => $user2){
            $group1 = new User_group_welfare;
            $group1->group_welfare_id = $welfareId;
            $group1->user_id = $user2;
            $group1->save();
        }

        return redirect()->route('history');
    }

}
