{{-- หน้าข้อมูลคำร้อง --}}

<!-- 
/*
* v_report.blade.php
* แสดงประวัติของการเบิกในจำนวนเงินทั้งหมด
* @input : -
* @output : แสดงข้อมูลประวัติย้อนหลัง 5 ปี และแสดงข้อมูลประวัติแต่ละปี
* @author : ชษิตา โตชาวนา 64160064 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-05
*/ -->

@extends('humanresources.v_humanresource_nav')

@section('content')


<div class="container">
    <!-- //ตัวแปรตั้งค่าโครง -->
    <div class="col-lg-20">
        <!-- //กำหนดบรรทัด col ของหน้าจอ -->
        <div class="card">
            <div class="card-header fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}</div>
            <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->
            <div class="card-body">
                <div class="row mt-3">
                    <!-- //กำหนดการเว้นระยะห่างจากหัว -->

                    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                    <!-- //กำหนด col และสร้างคำสถานะ -->
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> อนุมัติ </option>
                                        <option value="1">รออนุมัติ</option>
                        </select>
                        <!-- //ตัวเลือกสำหรับสถานะ -->
                     </div>
                    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                    <!-- //ตัวเลือกสำหรับรูปแบบสวัสดิการ -->
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> บุคคล </option>
                                        <option value="1">บุคคล</option>
                                        <option value="2">สันทนาการ</option>
                        </select>
                        <!-- //ตัวเลือกสำหรับรูปแบบสวัสดิการ -->
                    </div>
                    <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
                    <!-- //กำหนด col และสร้างคำ ปี พ.ศ. -->
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> ทั้งหมด </option>
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">2566</option>
                                        <option value="3">2565</option>
                                        <option value="4">2564</option>
                                        <option value="5">2563</option>
                                        <option value="6">2562</option>
                        </select>
                        <!-- //ตัวเลือกสำหรับ ปี พ.ศ. -->
                    </div>
                </div>
                <div class="row mt-3">
                    <!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
                    <div class="col-md-13">

                        <!-- //ในส่วนของตาราง -->
                        <table class="table table-bordered align-items-center" >
                            <thead class="text-center text-light " id="bg" >
                                <tr>
                                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">ประเภทสวัสดิการ</th>
                                    <th colspan="5" class="col-sm-1">ปี พ.ศ.</th>
                                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                                </tr>
                                <!-- //การแยก col และ row ในส่วนของตาราง -->
                                <tr class="text-center text-light " id="bg">
                                    <td class="col-sm-1">2566</td>
                                    <td class="col-sm-1">2565</td>
                                    <td class="col-sm-1">2564</td>
                                    <td class="col-sm-1">2563</td>
                                    <td class="col-sm-1">2562</td></tr>
                            </thead>
                            <!-- //กำหนดหัวข้อของตาราง -->
                                <tbody>
                                    <style >
                                        tr:nth-child(even) {
                                        background-color: #DCDCDC;
                                        }
                                    </style >
                                     <!-- //สร้างตารางสีขาวเทา -->
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td scope="col">ยอดรวม</td>
                                        <td scope="col-sm-1" class="text-end">2,000.00</td>
                                        <td scope="col-sm-1" class="text-end">2,000.00</td>
                                        <td scope="col-sm-1" class="text-end">2,000.00</td>
                                        <td scope="col-sm-1" class="text-end">2,000.00</td>
                                        <td scope="col-sm-1" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                </tbody>
                                 <!-- //ข้อความที่จะแสดง -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="container">
            <!-- //ตัวแปรตั้งค่าโครง -->
            <div class="col-lg-13">
                <!-- //กำหนดบรรทัด col ของหน้าจอ -->
                <div class="card">
                    <div class="card-header fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}</div>
                    <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->
                    <div class="card-body">
                        <div class="row mt-3">
                            <!-- //กำหนดการเว้นระยะห่างจากหัว -->

                            <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                            <!-- //กำหนด col และสร้างคำสถานะ -->
                            <div class="col-md-2">
                                <select class="form-control form-select" name="welfare" id="welfare">
                                            <option selected="" disabled=""> อนุมัติ </option>
                                                <option value="1">รออนุมัติ</option>
                                </select>
                                <!-- //ตัวเลือกสำหรับสถานะ -->
                            </div>
                            <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                            <!-- //ตัวเลือกสำหรับรูปแบบสวัสดิการ -->
                            <div class="col-md-2">
                                <select class="form-control form-select" name="welfare" id="welfare">
                                            <option selected="" disabled=""> บุคคล </option>
                                                <option value="1">บุคคล</option>
                                                <option value="2">สันทนาการ</option>
                                </select>
                                <!-- //ตัวเลือกสำหรับรูปแบบสวัสดิการ -->
                        </div>
                        <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
                        <!-- //กำหนด col และสร้างคำ ปี พ.ศ. -->
                        <div class="col-md-2">
                                <select class="form-control form-select" name="welfare" id="welfare">
                                            <option selected="" disabled=""> ทั้งหมด </option>
                                                <option value="1">ทั้งหมด</option>
                                                <option value="2">2566</option>
                                                <option value="3">2565</option>
                                                <option value="4">2564</option>
                                                <option value="5">2563</option>
                                                <option value="6">2562</option>
                                </select>
                                <!-- //ตัวเลือกสำหรับ ปี พ.ศ. -->
                        </div>
                    </div>
                    </div>

                </div>
            </div>
            </div>
                        <div class="row mt-3">
                            <!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
                            <div class="col-md-13">

                            <!-- //ในส่วนของตาราง -->
                            <table class="table table-bordered align-items-center" >
                                <thead class="text-center text-light " id="bg" >
                                    <tr>
                                        <th rowspan="2" class="col-sm-1" valign="middle" align="center">ประเภทสวัสดิการ</th>
                                        <th colspan="12" class="col-sm-1">เดือน</th>
                                        <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                                    </tr>
                                    <!-- //การแยก col และ row ในส่วนของตาราง -->
                                    <tr class="text-center text-light " id="bg">
                                        <td class="col-sm-1">ม.ค.</td>
                                        <td class="col-sm-1">ก.พ.</td>
                                        <td class="col-sm-1">มี.ค.</td>
                                        <td class="col-sm-1">เม.ย.</td>
                                        <td class="col-sm-1">พ.ค.</td>
                                        <td class="col-sm-1">มิ.ย.</td>
                                        <td class="col-sm-1">ก.ค.</td>
                                        <td class="col-sm-1">ส.ค.</td>
                                        <td class="col-sm-1">ก.ย.</td>
                                        <td class="col-sm-1">ต.ค.</td>
                                        <td class="col-sm-1">พ.ย.</td>
                                        <td class="col-sm-1">ธ.ค.</td>
                                    </tr>
                                </thead>
                                <!-- //กำหนดหัวข้อของตาราง -->
                                <table class="table table-striped">
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                </table>
                                <!-- //ข้อความที่จะแสดง -->
                        </table>
                            </div>
                        </div>
@endsection
