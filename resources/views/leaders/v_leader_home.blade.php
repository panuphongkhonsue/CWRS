{{-- หน้าหลักของหัวหน้าแผนกลบแก้ใหม่ก็ได้ --}}

<!--
/*
* v_leader_home.blade.php
* แสดงหน้าหลักของหัวหน้าแผนก
* @input  : -
* @output : แสดงข้อมูลคำร้องขอของพนักงาน
* @author : ชษิตา โตชาวนา 64160064 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-06
*/ -->

@extends('leaders.v_leader_nav')

@section('content')

    <div class="col-lg-20">
        <!-- //กำหนดบรรทัด col ของหน้าจอ -->
        <div class="card ">
            <div class="card-header fs-4 py-3">{{ __('คำร้องขอเบิกสวัสดิการ') }}</div>
            <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->
            <livewire:maneger-filter/>
                <div class="row mt-3">
                    <!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
                <livewire:maneger-show/>   
                </div>
                </div>
            </div>
        </div>


@endsection
