@extends('humanresources.v_humanresource_nav')

@section('content')
<div class="container">
    <div class="col-lg-13">

       {{--
        /*
        * v_manage_request
        * แสดงรายการคำขอเบิกสวัสดิการพนักงาน
        * @input : ฟอร์มใบเบิกสวัสดิการพนักงาน
        * @output : -
        * @auther : ภูรินทร์ ลามากุล 64160284 , รวิชญ์ พิบูลย์

        * @Create Date : 2023-04-05
        */

        --}}

        {{--  --}}
        <div class="row">
            <div class="col-md-3">
                <div class="card btn hov_buttom ">
                    <div class="card-body">
                        <div class="text-center text-primary fs-5 "><img class="status_b "src="{{ URL::asset('img/image.png') }}" width="60" height="60">ทั้งหมด</div>
                        <div><input type="text" class="ee" value="219" readonly></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card btn hov_buttom">
                    <div class="card-body">
                        <div class="text-center text-warning fs-5"><img class="status_b" src="{{ URL::asset('img/pending-approval.png') }}" width="60" height="60" style="">รออนุมัติ</div>
                            <div><input type="text" class="ee" value="219" readonly></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card btn hov_buttom p-0">
                    <div class="card-body">
                        <div class="text-center text-success fs-5"><img class="status_b" src="{{ URL::asset('img/อนุมัติ.png') }}" width="60" height="60">อนุมัติ</div>
                        <div><input type="text" class="ee" value="219" readonly></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card btn hov_buttom p-0">
                    <div class="card-body">
                        <div class="text-center text-danger fs-5 mt-3 "><img class="status_b" src="{{ URL::asset('img/ไม่อนุมัติ.png') }}" width="60" height="60">ไม่อนุมัติ</div>
                        <div><input type="text" class="ee" value="219" readonly></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-md-13">

                        <div class="row">
                            {{-- ข้อความ --}}
                            <div class="aa col-auto mt-2">
                                <label>(ชื่อ-นามสกุล,รหัสพนักงาน,เลขที่ใบเบิก) :</label>
                            </div>

                             {{-- กล่องค้นหา --}}
                            <div class="col-auto ll mt-2">
                                <input type="text" class="form-control  jj" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                            </div>

                            {{-- ปุ่มค้นหา --}}
                              <div class="ll col-auto ">
                                <button class="btn" type="button" id="button-addon2"><img class="status_b" src="{{ URL::asset('img/image1.png') }}" width="18" height="18"></button>
                              </div>

                              {{-- ข้อความ --}}
                              <div class="col-auto oo mt-1">
                                <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                              </div>


                              {{-- ตัวเลือกรายหลายการ : รูปแบบสวัสดิการ --}}
                              <div class="col-auto mt-2">
                                <select class="form-control form-select colortext" name="welfare" id="welfare" style="height: 34px">
                                            <option selected=""value ="1" > ทั้งหมด </option>

                                                <option value="2">บุคคล</option>
                                                <option value="3">สันทนาการ</option>
                                </select>

                              </div>

                              {{-- ข้อความ --}}
                              <div class="col-auto mt-1">
                                <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
                              </div>

                              {{-- ตัวเลือกรายหลายการ : ปีพ.ศ.ย้อนหลัง5ปี รวมปีปัจจุบัน --}}
                              <div class="col-auto mt-2 ">
                                <select class="form-control form-select colortext" name="welfare" id="welfare" style="height: 34px" >
                                                <option selected="" value="1">ทั้งหมด</option>
                                                <option value="2">2566</option>
                                                <option value="3">2565</option>
                                                <option value="4">2564</option>
                                                <option value="5">2563</option>
                                                <option value="6">2562</option>
                                </select>
                        </div>




                        </div><br>

















                        {{-- ในส่วนคอลัมของตาราง --}}

                        <table class="table table-bordered align-items-center">
                            <thead class="text-center text-light" id="bg">
                                <tr>
                                    <td scope="col" class="col-sm-1">วันที่</td>
                                    <td scope="col" class="col-sm-1">เลขที่</td>
                                    <td scope="col" class="col-sm-1">รูปแบบ</td>
                                    <td scope="col">ผู้เบิก</td>
                                    <td scope="col" class="col-md-3">ประเภทสวัสดิการ</td>
                                    <td scope="col" class="col-sm-2 ">จำนวนเงิน (บาท)</td>
                                    <td scope="col" class="col-sm-1">สถานะ</td>
                                    <td scope="col" class="col-sm-1">แสดงผล</td>
                                </tr>
                            </thead>
                            <tbody class="">
                                {{-- แสดงรายใบเบิกสวัสดิการพนักงานพนักงาน --}}
                                @foreach ($requests as $index => $request)
                                    <tr>
                                        <td scope="col" class="col-sm-1 text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                                        <td scope="col" class="col-sm-1 text-center">{{ $request->id }}</td>
                                        <td scope="col" class="col-sm-1 text-center"></td>
                                        <td scope="col" class="">{{ $request->get_user->fname }}</td>
                                        <td scope="col" class="col-md-3">{{ $request->get_welfare->title }}</td>
                                        <td scope="col" class="col-sm-2 text-end">{{ $request->get_welfare->budget }}</td>
                                        <td scope="col" class="col-sm-1 text-center"></td>
                                        <td scope="col" class="col-sm-1 text-center"><button type="button"
                                            class="btn btn-sm btn-primary" style="font-size: 10px">แสดงรายการ</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $requests->links('pagination::bootstrap-5') !!}
                    </div>
                </div>

                {{-- อธิบายสัญลักษณ์สถานะ --}}
                <div class="row mt-3">
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
