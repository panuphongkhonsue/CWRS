<?php /*
* Request_controller
* Request_controller handle request event
* @author : Rawich Piboonsin 64160299
* @Create Date : 2023-03-15
*/

namespace App\Http\Controllers;

use App\Models\Welfare;
use App\Models\Bill;
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
        $data['welfares'] = Welfare::all()->where('type', 'S');
        return view('v_request', $data);
    }

    public function group_request()
    {
        $data['welfares'] = Welfare::all()->where('type', 'G');
        return view('v_group_request', $data);
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
