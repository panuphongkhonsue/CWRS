{{-- หน้าข้อมูลคำร้อง --}}

<!--
/*
* v_report.blade.php
* แสดงประวัติของการเบิกในจำนวนเงินทั้งหมด
* @input : กดแถบข้างเพื่อเข้าหน้ารายงานสรุปการเบิก
* @output : แสดงข้อมูลประวัติย้อนหลัง 5 ปี และแสดงข้อมูลประวัติแต่ละปี
* @author : ชษิตา โตชาวนา 64160064 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-05
*/ -->

@extends('humanresources.v_humanresource_nav')

@section('content')


    <div class="col-lg-20">
        <div class="card">
            <div class="card-header fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}</div>
                <div class="card-body">
                    <livewire:report-filter/>
                    <br>
                    <livewire:report-show/>
                </div>
            </div>
        </div>
    </div>


@endsection
