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
    */
    public function single_request()
    {
        $user = Auth::user();
        $requests = Single_request::where('user_id', $user->id)->get();

        $welfare_id[] = NULL;

        foreach ($requests as $request) {
            if (date("Y", strtotime($request->create_date)) == date("Y")) {
                $welfare_id[] = $request->welfare_id;
            }
        }

        if ($welfare_id == NULL) {
            $data = Welfare::where('type', 'S')->get();
            return view('v_request', ['welfares' => $data]);
        }

        $data = Welfare::where('type', 'S')->whereNotIn('id', $welfare_id)->get();

        return view('v_request', ['welfares' => $data]);
    }

    public function group_request()
    {
        $data = Welfare::where('type', 'G')->get();

        return view('v_group_request', ['welfares' => $data]);
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
}
