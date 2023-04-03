{{-- หน้าแสดงประวัติที่เป็นตารางๆ อะ --}}

@extends('employees.v_employee_nav')

@section('content')

<div class="container">
    <div class="col-lg-13">
        <div class="card">              
            <div class="card-header fs-4 py-3">{{ __('ประวัติการเบิกสวัสดิการ') }}</div>
            <div class="card-body">
                <div class="row mt-3">
                    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> รออนุมัติ </option> 
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">รออนุมัติ</option>
                                        <option value="3">อนุมัติ</option>
                                        <option value="4">ไม่อนุมัติ</option>
                                        <option value="5">ยกเลิก</option>                                            
                        </select>
                     </div>
                    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> ทั้งหมด </option> 
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">บุคคล</option>
                                        <option value="3">สันทนาการ</option>                                                              
                        </select>

                </div>
                <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
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
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-13">

                        {{-- ในส่วนของตาราง --}}
                        <table class="table table-bordered align-items-center">
                            <thead class="text-center text-light" id="bg">
                                <tr>
                                    <td scope="col" class="col-sm-1">วันที่</td>
                                    <td scope="col" class="col-sm-1">เลขที่</td>
                                    <td scope="col" class="col-sm-1">รูปแบบ</td>
                                    <td scope="col">ประเภทสวัสดิการ</td>
                                    <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                                    <td scope="col" class="col-sm-1 ">สถานะ</td>
                                    <td scope="col" class="col-sm-2">แสดงผล</td>
                                </tr>
                            </thead>
                            <tbody class="">

                                @foreach ($requests as $request)
                                    <tr>
                                        @switch($request->pivot->status)
                                            @case(0)
                                                @php ($icon = 'wait.png')
                                                @break
                                            @case(-2)
                                                @php ($icon = 'cancel.png')
                                                @break
                                            @case(1)
                                                @php ($icon = 'approve.png')
                                                @break
                                            @case(-1)
                                                @php ($icon = 'cancel2.png')
                                                @break
                                        @endswitch
                                        
                                        <td class="text-center">{{ date("d/m/Y", strtotime($request->pivot->create_date)) }}</td>
                                        <td class="text-center">{{ $request->pivot->id }}</td>
                                        <td class="text-center">บุคคล</td>
                                        <td>{{ $request->title }}</td>
                                        <td class="text-end">{{ $request->budget }}</td>
                                        <td class="text-center"><img src="{{ URL::asset('/img/'. $icon) }}" width="32" height="32"></td>
                                        <td class="text-center"><a href="{{ route('show_history', ['id' => $request->pivot->id]) }}" class="btn btn-sm btn-primary">แสดงรายการ</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
@endsection
