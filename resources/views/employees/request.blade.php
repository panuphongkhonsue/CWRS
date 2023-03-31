{{-- หน้าขอเบิกสวัสดิการแบบบุคคล --}}

@extends('employees.empnav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-13">
           {{--  กรอบพื้นหลัง --}}
            <div class="card">
                {{-- border:0 cellspacing:0 cellpadding:0 --}}
                {{-- <div class="card-header fs-4 py-3">{{ __('เบิกสวัสดิการแบบรายบุคคล') }}</div> --}}
                <div class="i" style="line-height:25px">{{ __('เบิกสวัสดิการแบบบุคคล') }}
                    <hr width="355">
                </div>

                 <div class="card-body" style="padding: 0px 50px 50px 50px">

                    {{-- กรอบขอมูล --}}

                    <div class="card px-4 py-3 border-0 " style=" background-color: #eee;">
                    <form method="POST" action="{{ route('create.single') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- วันที่ --}}
                        <div class="row">
                            <label for="budget" class="col-auto col-form-label ms-auto fw-bolder fs-5">{{ __('วัน/เดือน/ปี : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" id="date" name="date" class="form-control border-0 bg-transparent fs-5" value="{{ date("d/m/Y") }}" >
                            </div>
                        </div>

                        {{-- รหัสพนักงาน --}}
                        <div class="row ms-3 mt-1">
                            <label for="id" class="col-sm-2 col-form-label fw-bold fs-5">{{ __('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent fs-5" value="{{ Auth::user()->id }}" disabled>
                            </div>

                        </div>

                        {{-- ชื่อ นามกุล --}}
                        <div class="row ms-3 mt-1">
                            <label for="name" class="col-sm-2 col-form-label fw-bold fs-5">{{ __('ชื่อ-สกุล : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent fs-5" value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" disabled>
                            </div>
                        </div>


                        {{-- แผนก --}}
                        <div class="row ms-3 mt-1">
                            <label for="department" class="col-sm-2 col-form-label fw-bold fs-5">{{ __('แผนก : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent fs-5" value="{{ Auth::user()->department->name }}" disabled>
                            </div>
                        </div>
                    </div>

                        {{-- แถบเลือกประเภท --}}
                        <div class="row mt-5 ">
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <select class="form-control" name="welfare" id="welfare">
                                    <option selected disabled>เลือกประเภทสวัสดิการ</option>

                                    {{-- 3 บรรทัดนี้ ห้ามแก้ --}}
                                    @foreach ($welfares as $welfare)
                                        <option value="{{ $welfare->id }}">{{ $welfare->title }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- จำนวนเงิน --}}
                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control border-0" style=" background-color: #eee;"
                                 value="{{ __('2,000.00') }}" disabled>
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-5 fs-5">
                            <div class="col-md-4">
                                รายละเอียดการขอเบิกสวัสดิการ
                                <hr width="255" class="mt-0">

                            </div>
                            </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-lg-11">
                                {{-- ตารางไว้ใส่รายละเอียด --}}
                                <table id="detail" class="table table-bordered">
                                    <thead style="background-color: rgb(4, 62, 129)">
                                        <tr class="text-center">
                                            <th scope="col" class="col-lg-8 text-white">รายละเอียด</th>
                                            <th scope="col" class="text-white">จำนวนเงิน (บาท)</th>
                                            <td><button class="btn btn-sm btn-success">เพิ่ม</button></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control border-0"></td>
                                            <td><input type="text" class="form-control text-end border-0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- จำนวนเงินทั้งหมด ที่อยู่ข้างล่างตาราง --}}
                        <div class="row mt-3">
                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control text-end border-0" style=" background-color: #eee;"
                                value="{{ __('0') }}" readonly>
                            </div>
                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        {{-- แถบอัปโหลดใบเสร็จ --}}
                        <div class="row mt-3 control-group increment">
                            <label for="bill" class="col-auto col-form-label">อัปโหลดใบเสร็จ : </label>
                                <div class="col-sm-5">
                                    <input type="file" name="filename[]" class="form-control file" value="อัปโหลดไฟล์">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-success add-file" type="button">+</button>
                                </div>
                        </div>
                        <div class="frame312-frame09">

                            <span class="frame312-text48"><span>อัปโหลดไฟล์</span></span>

                          </div>

                        {{-- ตรงนี้คือตอนกด + เพิ่มไฟล์ --}}
                        <div class="clone hide" hidden>
                            <div class="row mt-3 control-group" style="margin-left: 120px">
                                <div class="col-sm-5">
                                    <input type="file" name="filename[]" class="form-control file" value="อัปโหลดไฟล์">
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-danger remove-file" type="button">-</button>
                                </div>
                            </div>

                        </div>

                        {{-- ปุ่มส่งเบิก --}}
                        <div class="row mt-3">
                            <div class="col-sm-2 ms-auto">
                                <button type="submit" class="btn btn-lg btn-success">ส่งเบิก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ตรงนี้อย่านะไอสัส --}}
<script type="text/javascript">
    var rowCount = 1;

    $(document).ready(function() {
        $(".add-file").click(function() {
            if (rowCount < 5)
            {
                var html = $(".clone").html();
                $(".increment").after(html);
                rowCount++;
            }

        });

        $("body").on("click",".remove-file", function() {
            rowCount--;
            $(this).parents(".control-group").remove();
        })
    })
</script>
@endsection
