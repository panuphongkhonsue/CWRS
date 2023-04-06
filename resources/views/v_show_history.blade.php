{{-- หน้าแสดงประวัติ หลังจากกด แสดงรายการ --}}

@extends('employees.v_employee_nav')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-13">

            <!-- กรอบพื้นหลัง -->
            <div class="card">

                <!-- หัวข้อใบเบิก -->
                <div class="bold_header mx-4" style="line-height:20px">{{ __('เบิกสวัสดิการแบบบุคคล') }}
                    <hr width="295" class="mb-2">{{-- เส้นใต้ --}}
                </div>

                <div class="card-body mx-5 px-5 mb-0 border-0 p-0">

                    <!-- กรอบข้อมูล -->
                    <form method="POST" action="{{ route('cancel', ['id' => $history->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mt-2">
                            <div class="card px-4 py-3 pb-4 border-0" style=" background-color: #eee;">
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="row text-right mt-2">

                                        <!-- วันที่เบิกสวัสดิการ -->
                                        <label for="budget" class="col-auto col-form-label ms-auto fw-bold ">{{ __('วัน/เดือน/ปี : ') }}</label>
                                        <div class="col-sm-3 ">
                                            <input type="text" id="date" name="date" class="form-control border-0 bg-transparent " value="{{ date("d/m/Y", strtotime($history->create_date)) }}" disabled>
                                        </div>

                                        <!-- เลขที่ใบเบิก -->
                                        <label for="req-id" class="col-auto col-form-label fw-bold">{{ __('เลขที่ใบเบิก : ') }}</label>
                                        <div class="col-sm-2 ">
                                            <input type="text" name="req-id" id="req-id" class="form-control border-0 bg-transparent top-0 end-0" value="{{ $history->id }}" disabled>
                                        </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- แสดงสถานะ -1 คือ วันที่ถูกยกเลิก -->
                                <!-- แสดงสถานะ 1 คือ วันที่ถูกอนุมัติ -->
                                <!-- แสดงสถานะ -1 คือ วันที่ไม่ถูกอนุมัติ -->
                                @if ($history->status == -1)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('วันที่ถูกยกเลิก') }}</small>
                                    </div>
                                </div>

                                @elseif($history->status == 1)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('วันที่ถูกอนุมัติ') }}</small>
                                    </div>
                                </div>

                                @elseif($history->status == -2)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('วันที่ไม่ถูกอนุมัติ') }}</small>
                                    </div>
                                </div>
                                @endif

                                <!-- รหัสพนักงาน -->
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="id" class="col-form-label fw-bold">{{ __('รหัสพนักงาน : ') }}</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->id }}" disabled>
                                    </div>

                                    <!-- แสดงรูปแล้วกรอบรูปของสถานะ 1 คือ ถูกอนุมัติ -->
                                    @if($history->status == 1)
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group position-absolute top-0 end-0">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/tt11.png') }}" class="img-rounded" alt="" width="26" height="26"></span>
                                            </div>
                                                <div class="col-xs-2">
                                                    <input value="{{ date("d/m/Y", strtotime($history->hr_approve_date)) }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                                </div>
                                        </div>
                                    </div>

                                    <!-- แสดงรูปแล้วกรอบรูปของสถานะ -1 คือ ไม่ถูกอนุมัติ -->
                                    @elseif($history->status <= -1)
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group position-absolute top-0 end-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/bg.png') }}" class="img-rounded" alt="" width="26" height="26"</span>
                                            </div>
                                            <div class="col-xs-2">
                                                <input value="{{ date("d/m/Y", strtotime($history->hr_approve_date)) }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- แสดงรูปแล้วกรอบรูปของสถานะ คือ เมื่อผู้ใช้ยกเลิก -->
                                    @else
                                    <div class="col-sm form-group">
                                        <div class="input-group mx-5">

                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- แสดงก็ต่อเมื่อสถานะ 1 คือ ผ่านการอนุมัติโดย -->
                                @if($history->status == 1)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('ผ่านการอนุมัติโดย') }}</small>
                                    </div>
                                </div>

                                <!-- แสดงก็ต่อเมื่อสถานะ -2 คือ ไม่ผ่านการอนุมัติโดย -->
                                @elseif($history->status == -2)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('ไม่ผ่านการอนุมัติโดย') }}</small>
                                    </div>
                                </div>

                                <!-- แสดงก็ต่อเมื่อผู้ใช้ยกเลิกการเบิก-->
                                @else
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                                @endif

                                <!-- ชื่อ-นามกสุล -->
                                <div class="row mb-4">
                                    <div class="col-sm-2">
                                        <label for="name" class="col-form-label fw-bold">{{ __('ชื่อ-สกุล : ') }}</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->fname }} {{ $history->get_user->lname }}" disabled>
                                    </div>

                                    <!-- แสดงก็ต่อเมื่อสถานะ 1 คือ ผ่านการอนุมัติโดย -->
                                    @if($history->status == 1)
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group  position-absolute top-0 end-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/tt22.png') }}" class="img-rounded" alt="" width="26" height="26"</span>
                                            </div>
                                            <div class="col-xs-2">
                                                <input value="{{ $history->get_approver->fname }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- แสดงก็ต่อเมื่อสถานะ -2 คือ ไม่ผ่านการอนุมัติโดย -->
                                    @elseif($history->status == -2)
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group  position-absolute top-0 end-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/tt33.png') }}" class="img-rounded" alt="" width="26" height="26"</span>
                                            </div>
                                            <div class="col-xs-2">
                                                <input value="{{ $history->get_approver->fname }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- แสดงก็ต่อเมื่อผู้ใช้ยกเลิกการเบิก-->
                                    @else
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group  position-absolute top-0 end-0">

                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- แผนก -->
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="department" class="col-form-label fw-bold">{{ __('แผนก : ') }}</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->department->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">

                            <!-- แสดงประเภทสวัสดิการ -->
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control bg-transparent border-dark" value="{{ $history->welfare_name}}" name="" id="" readonly >
                            </div>

                            <!-- แสดงจำนวนเงินที่เบิกได้ -->
                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control border-0" value="{{ number_format($history->welfare_budget, 2) }}" disabled>
                            </div>
                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <!-- แสดงรายละเอียดการขอเบิกในตาราง -->
                        <div class="row mt-5 fs-5">
                            <div class="col-md-4 mb-0">
                                รายละเอียดการขอเบิกสวัสดิการ
                                <hr width="260" class="mb-0">
                            </div>
                        </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-lg-20">
                                <table id="detail" class="table table-bordered border-dark" style="left: 20px">
                                    <thead id="bg" class="text-white">
                                        <tr class="text-center">
                                            <th scope="col" class="col-lg-8">รายละเอียด</th>
                                            <th scope="col" class="">จำนวนเงิน (บาท)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php ($price = json_decode($history->price))
                                        @foreach (json_decode($history->item) as $index => $item)
                                            <tr>
                                                <td><input type="text" class="form-control border-0" value="{{ $item }}" readonly></td>
                                                <td><input type="text" class="form-control text-end border-0" value="{{ number_format($price[$index], 2) }}" readonly></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- แสดงจำนวนเงินทั้งหมด -->
                        <div class="row mt-3">
                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control text-end border-0" style=" background-color: #eee;" value="{{ number_format($history->total_price, 2) }}" readonly>
                            </div>
                            <label for="" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>


                        <!-- แสดงไฟล์เป็นหลักฐาน -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="bill">ไฟล์หลักฐาน</label>
                                    <div class="card-text px-4 rounded me-3 mb-5" style="background-color: #eee">
                                        @foreach (json_decode($history->bill) as $bill)
                                            <div class="row">
                                                <a href="{{ URL::asset('/bills/'. $bill) }}" for="" class="col-auto col-form-label" target="blank">{{ $bill }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>

                            <div class="col-md-6 text-end">
                                <label class="">หมายเหตุ : </label>
                                <div class="">
                                    @if(($history->status) == 0)
                                        <textarea name="note" style="width:400px; height:100px;" class="rounded text-start">{{ $history->note }}</textarea>
                                    @else
                                        <textarea name="note" style="width:400px; height:100px;" class="rounded text-start" readonly>{{ $history->note }}</textarea>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- แสดงปุ่มยกเลิกก็ต่อเมื่อ สถานะเป็น 0  -->
                        <div class="row mt-3">
                            @if (($history->status) == 0)
                            <div class="col-sm-2 ms-auto">
                                <button class="btn btn-lg btn-danger mb-5">ยกเลิก</a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
