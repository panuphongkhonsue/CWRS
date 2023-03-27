<?php /*
* Home_controller
* Home_controller redirect to user home
* @author : Rawich Piboonsin 64160299
* @Create Date : 2023-03-11
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Home_controller extends Controller
{
    /*
    * home()
    * เข้าสู่หน้าหลัก โดยขึ้นอยู่กับประเภทของผู้ใช้
    * @input : - 
    * @output : หน้าหลักของผู้ใช้
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-11
    */
    public function home()
    {
        if (Auth::check())
        {
            if (Auth::user()->type == "E")
            {
                return view('employees.v_employee_home');
            }

            else if (Auth::user()->type == "M")
            {
                return view('leaders.v_leader_home');
            }

            else if (Auth::user()->type == "H")
            {
                return redirect()->route('manage_request');
            }
        }
    }
}
