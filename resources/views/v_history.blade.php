{{-- หน้าแสดงประวัติที่เป็นตารางๆ อะ --}}

@extends(((Auth::user()->type == "E") ? 'employees.v_employee_nav' : 'leaders.v_leader_nav'))

@section('content')

    <div class="col-lg-13">
        <div class="card">
            <div class="card-header fs-4 py-3">{{ __('ประวัติการเบิกสวัสดิการ') }}</div>
            <div class="card-body">
                <div class="row mt-1">
                    <livewire:history-filter-status/>
                </div>
                <div class="row mt-3">
                    <livewire:history-show/>
                </div>
                    <div class="row mt-5">
                        <div class="col-lg-6 ms-auto">
                        <nav aria-label="ms-auto">
                        <ul class="pagination" class="col-auto col-form-label ms-auto">หน้า
                            &nbsp;<li class="page-item disabled">
                            <a class="page-link">ก่อนหน้า</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">ถัดไป</a>
                            </li>
                        </ul>
                    </nav></div>
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

