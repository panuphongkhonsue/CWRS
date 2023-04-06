{{-- หน้าหลักของหัวหน้าแผนกลบแก้ใหม่ก็ได้ --}}

<!-- 
/*
* v_leader_home.blade.php
* แสดงหน้าหลักของหัวหน้าแผนก
* @input  :  -
* @output : แสดงข้อมูลคำร้องขอของพนักงาน
* @author : ชษิตา โตชาวนา 64160064 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-06
*/ -->

@extends('leaders.v_leader_nav')

@section('content')

    <!-- //ตัวแปรตั้งค่าโครง -->
    <div class="col-lg-20">
        <!-- //กำหนดบรรทัด col ของหน้าจอ -->
        <div class="card ">
            <div class="card-header fs-4 py-3">{{ __('คำร้องขอเบิกสวัสดิการ') }}</div>
            <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->
            <div class="card-body">
                <div class="row mt-3" >
                    <!-- //กำหนดการเว้นระยะห่างจากด้านบน -->

                <div class ="col-auto margitext mt-3">
                     <label>(ชื่อ-นามสกุล,รหัสพนักงาน,เลขที่ใบเบิก) :</label>
                     <!-- //กำหนด col สำหรับตัวค้นหา -->
                </div>
                    <div class="col-auto col-form-label mt-2">
                        <input type="text" class="form-control p-0 " placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <!-- //ช่องสำหรับการค้นหา -->
                    </div>
                        <div class ="col-auto mt-2 ">
                            <button class="btn p-0 status_b" type="button" id="button-addon2"><img class="status_b p-0" src="{{ URL::asset('img/image.png') }}" width="15" height="15"></button>
                            <!-- //ไอคอนสำหรับค้นหาา -->
                        </div>                    
                    <label for="budget" class="col-auto mt-3"> สถานะ : </label>
                    <!-- //กำหนด col และสร้างคำสถานะ -->
                    <div class="col-md-2">
                        <select class="form-control form-select mt-2" name="welfare" id="welfare">
                                    <option selected="" disabled=""> รออนุมัติ </option>
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">รออนุมัติ</option>
                                        <option value="3">อนุมัติ</option>
                                        <option value="4">ไม่อนุมัติ</option>
                                        <option value="5">ยกเลิก</option>             
                        </select>
                        <!-- //ตัวเลือกสำหรับสถานะ -->
                     </div>
                    <label for="budget" class="col-auto mt-3 "> ปี พ.ศ. : </label>
                    <!-- //กำหนด col และสร้างคำ ปี พ.ศ. -->
                    <div class="col-md-2">
                        <select class="form-control form-select mt-2" name="welfare" id="welfare">
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
                        <table class="table table-bordered align-items-center">
                            <thead class="text-center text-light" id="bg">
                                <tr>
                                    <td scope="col" class="col-sm-1">วันที่</td>
                                    <td scope="col" class="col-sm-1">เลขที่</td>
                                    <td scope="col" class="col-sm-1">ผู้เบิก</td>
                                    <td scope="col">ประเภทสวัสดิการ</td>
                                    <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                                    <td scope="col" class="col-sm-1 ">สถานะ</td>
                                    <td scope="col" class="col-sm-2">แสดงผล</td>
                                </tr>
                                <!-- //กำหนดหัวข้อของตาราง -->
                            </thead>
                                <table class="table table-striped">
                                    <!-- //สร้างตารางสลับสีขาวเทา -->
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
                </div>
            </div>
        </div>


@endsection
