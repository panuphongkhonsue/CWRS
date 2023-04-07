{{-- หน้าแสดงประวัติขที่เป็นตารางๆ อะ --}}

<!-- 
/*
* v_history.blade.php
* แสดงประวัติของพนักงาน
* @input : กดแถบข้างเพื่อเข้าสู่หน้าประวัติของพนักงาน
* @output : แสดงข้อมูลประวัติของฉันในส่วนของพนักงาน
* @author : ชษิตา โตชาวนา 64160064 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-06
*/ -->

@extends(((Auth::user()->type == "E") ? 'employees.v_employee_nav' : 'leaders.v_leader_nav'))

@section('content')

    <div class="col-lg-13">
        <!-- //กำหนดบรรทัด col ของหน้าจอ -->
        <div class="card">
            <div class="card-header fs-4 py-3">{{ __('ประวัติการเบิกสวัสดิการ') }}</div>
            <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->
            <div class="card-body">
                <div class="row mt-1">
                    <livewire:history-filter-status/>
                </div>
                <div class="row mt-3">
                    <livewire:history-show/>
                </div>
                <div class="row mt-3">
                    <!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
                    <div class="col-lg-5 ms-auto text-end">
                        {{ __('หมายเหตุ')  }}
                        &nbsp; {{ __(':')}}
                        &nbsp;
                        <img src="{{ URL::asset('img/approve.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('อนุมัติ') }}
                        &nbsp;
                        <img src="{{ URL::asset('img/cancel.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('ไม่อนุมัติ') }}
                        &nbsp;
                        <img src="{{ URL::asset('img/wait.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('รออนุมัติ') }}
                        &nbsp;
                        <img src="{{ URL::asset('img/cancel2.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('ยกเลิก') }}
                    </div>
                    <!-- //ระบุหมายเหตุต่าง ๆ ในส่วนของสถานะ -->
                </div>
            </div>
        </div>
        </div>
    </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $(".btn-custom").click(function() {
            var selected = document.getElementById("selected");
            selected.classList.remove("selected");
            $(this).id = "selected";
        })
    })
</script> --}}
@endsection

