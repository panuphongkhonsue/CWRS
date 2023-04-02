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
                <div class="i mx-5" style="line-height:20px">{{ __('เบิกสวัสดิการแบบบุคคล') }}
                    <hr width="295" class="mb-2">
                </div>

                 <div class="card-body" style="padding: 0px 50px 50px 50px">

                    {{-- กรอบขอมูล --}}
                    <div class="card mx-5 px-4 py-3 mb-0 border-0 " style=" background-color: #eee;">
                    <form method="POST" action="{{ route('create.single') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- วันที่ --}}
                        <div class="row">
                            <label for="budget" class="col-auto col-form-label ms-auto fw-bold ">{{ __('วัน/เดือน/ปี : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" id="date" name="date" class="form-control border-0 bg-transparent " value="{{ date("d/m/Y") }}" >
                            </div>
                        </div>

                        {{-- รหัสพนักงาน --}}
                        <div class="row ms-3 mt-1">
                            <label for="id" class="col-sm-2 col-form-label fw-bold">{{ __('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ Auth::user()->id }}" disabled>
                            </div>

                        </div>

                        {{-- ชื่อ นามกุล --}}
                        <div class="row ms-3 mt-1">
                            <label for="name" class="col-sm-2 col-form-label fw-bold ">{{ __('ชื่อ-สกุล : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" disabled>
                            </div>
                        </div>


                        {{-- แผนก --}}
                        <div class="row ms-3 mt-1 mb-2 ">
                            <label for="department" class="col-sm-2 col-form-label fw-bold">{{ __('แผนก : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control border-0 bg-transparent" value="{{ Auth::user()->department->name }}" disabled>
                            </div>
                        </div>
                    </div>

                        {{-- <button class="px-2 py-auto rounded-circle">+</button> --}}


                        {{-- แถบเลือกประเภท --}}
                        <div class="row mt-3 mx-5">
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <select class="form-control border-dark form-select" name="welfare" id="welfare">
                                    <option selected disabled >เลือกประเภทสวัสดิการ</option>

                                    {{-- 3 บรรทัดนี้ ห้ามแก้ --}}
                                    @foreach ($welfares as $welfare)
                                        <option value="{{ $welfare->id }}">{{ $welfare->title }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- จำนวนเงิน --}}
                            <label for="budget" class="col-auto col-form-label ms-auto ">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control border-0" style=" background-color: #eee;"
                                 value="{{ __('2,000.00') }}" disabled>
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-3 fs-5 mx-5">
                            <div class="col-md-4">
                                รายละเอียดการขอเบิกสวัสดิการ
                                <hr width="255" class="my-0">
                                <div class="text-danger mb-2" style="font-size: 5px">จำนวนสูงสุด 10 รายการ</div>
                            </div>
                            </div>


                       {{--  <div class="row mt-2 d-flex justify-content-center">
                            <div class="col-lg-11">

                                <table id="detail" class="table table-bordered border-dark">
                                    <thead id="bg" >
                                        <tr class="text-center text-white" >
                                            <th scope="col" class="col-lg-8 text-white">รายละเอียด</th>
                                            <th scope="col" class="text-white">จำนวนเงิน (บาท)</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control border-0"></td>
                                            <td><input type="text" class="form-control text-end border-0"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control border-0"></td>
                                            <td><input type="text" class="form-control text-end border-0"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control border-0"></td>
                                            <td><input type="text" class="form-control text-end border-0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}




                            <div class="row wfh px-5">
                                <div class="col-md-11">



                                        <table id="detail" class="table table-bordered border-dark">
                                            <thead id="bg" >
                                                <tr class="text-center text-white" >
                                                    <th scope="col" class="col-sm-7 text-white">รายละเอียด</th>
                                                    <th scope="col" class="col-sm-4 text-white">จำนวนเงิน (บาท)</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control border-0"></td>
                                                    <td><input type="text" class="form-control text-end border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control border-0"></td>
                                                    <td><input type="text" class="form-control text-end border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control border-0"></td>
                                                    <td><input type="text" class="form-control text-end border-0"></td>
                                                </tr>
                                            </tbody>
                                        </table>



                                </div>
                                <div class="col-md-1 p-0">


                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <button class="border-0 bg-transparent">
                                                    <img src="{{ URL::asset('img/add.png') }}" width="20" height="20">
                                                </button>
                                            </tr>
                                        </thead>

                                        <tbody >
                                            <tr>
                                                <td class="border-0">
                                                    <button class="border-0 bg-transparent">
                                                        <img src="{{ URL::asset('img/delete.png') }}" width="35" height="35">
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-0">
                                                    <button class="border-0 bg-transparent">
                                                        <img src="{{ URL::asset('img/delete.png') }}" width="35" height="35">
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>



                                </div>
                            </div>




                            <div class="row g-0">
                                <div class="col-md-4">
                                     {{-- แถบอัปโหลดใบเสร็จ --}}
                                    <div class="text-center p-0">
                                            <div>
                                                อัปโหลดรายการใบเสร็จ
                                            </div>
                                                <input type="file" id="file_up">
                                            <div class="col mx-3 my-2">
                                                <label for="file_up" class="col col-form-label border border-success px-2 text-success rounded-3 ">+ อัปโหลดไฟล์</label>
                                                <div class="text-danger" style="font-size: 5px">จำนวนสูงสุด 5 ไฟล์ (.jpg, .pdf)</div>
                                            </div>
                                    </div>

                                </div>
                                <div class="col-md-8 ">
                                    <div class=" p-0">
                                        {{-- จำนวนเงินทั้งหมด ที่อยู่ข้างล่างตาราง --}}
                                        <div class="row ">
                                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control text-end border-0 " style=" background-color: #eee;"
                                                value="{{ __('0.00') }}" readonly>
                                            </div>
                                            <label for="id" class="col-auto col-form-label me-5">{{ __('บาท') }} <label style="color:#fff">_</label></label>
                                        </div>

                                    </div>
                                </div>
                            </div>





                      {{--   <div class="card-body m-0 p-0">
                            <div class="row ">
                                <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control text-end border-0" style=" background-color: #eee;"
                                    value="{{ __('0') }}" readonly>
                                </div>
                                <label for="id" class="col-auto col-form-label me-5">{{ __('บาท') }}</label>
                            </div>
                        </div>
 --}}

                     {{--    <div class="card-body  text-center m-0 p-0" style="width: 500px; hight: 50px">
                            <div class="row ">
                                <div>
                                    อัปโหลดรายการใบเสร็จ
                                </div>
                                    <input type="file" id="file_up">
                                <div class="col mx-3 my-2">
                                    <label for="file_up" class="col col-form-label border border-success px-2 text-success rounded-3 ">+ อัปโหลดไฟล์</label>
                                    <div class="text-danger" style="font-size: 5px">จำนวนสูงสุด 5 ไฟล์ (.jpg, .pdf)</div>
                                </div>
                            </div>
                        </div>
 --}}



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
                        <div class="row mb-4">
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
