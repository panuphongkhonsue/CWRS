@extends('leaders.v_leader_nav')

@section('content')

    <div class="col-lg-20">
        <!-- //กำหนดบรรทัด col ของหน้าจอ -->
        <div class="card ">
            <div class="card-header fs-4 py-3">{{ __('คำร้องขอเบิกสวัสดิการ') }}</div>
            <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->
                <livewire:manager-filter/>
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
                                    <tr class="text-center">
                                    <!-- //สร้างตารางและกำหนดสีของตาราง -->
                                    @if (Session::has('message'))
                                        <td class="text-center">{{ Session::get('message') }}</td>
                                    @endif
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