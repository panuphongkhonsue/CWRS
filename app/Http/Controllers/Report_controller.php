<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Report_controller extends Controller
{
      /*
    * report()
    * แสดงค่าหน้าจอ v_report(รอ)
    * @input : -
    * @output : หน้าหลักของผู้ใช้
    * @author : Rawich Piboonsin 64160299
    * @Create Date : 2023-03-11
    */
    public function report()
    {
        return view('v_report');
    }

}
