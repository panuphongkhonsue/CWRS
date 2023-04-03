{{-- หน้าขอเบิกสวัสดิการแบบบุคคล --}}

@extends('employees.v_employee_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="ti_wal fs-4">{{ __('เบิกสวัสดิการแบบสันทนาการ') }} <hr width="295" class="mb-2" style="margin-top: 0px"></div>

                <div class="card-body ">
                    <div class="card mx-5 px-4 py-3 mb-0 border-0 " style=" background-color: #eee;">
                    <form method="POST" action="{{ route('create.single') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- วันที่ --}}
                        <div class="row">
                            <label for="budget" class="col-auto col-form-label ms-auto fw-bolder ">{{ ('วัน/เดือน/ปี : ') }}</label>
                            <div class="col-sm-2">
                                {{-- generate วันที่ --}}
                                <input type="text" id="date" name="date" class="form-control border-0 bg-transparent fs-16px" value="{{ date("d/m/Y") }}" >
                            </div>
                        </div>

                        {{-- รหัสพนักงาน --}}
                        <div class="row ms-5 mt-1">
                            <label for="id" class="col-sm-2 col-form-label fw-bold">{{ ('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-3">
                                {{-- generate รหัสพนักงาน --}}
                                <input type="text" class="form-control border-0 bg-transparent fs-16px" value="{{ Auth::user()->id }}" disabled>
                            </div>
</div>

                        {{-- ชื่อ นามกุล --}}
                        <div class="row ms-5 mt-1">
                            <label for="name" class="col-sm-2 col-form-label fw-bold ">{{ ('ชื่อ-สกุล : ') }}</label>
                            <div class="col-sm-3">
                                {{-- generate ชื่อ-นามสกุล --}}
                                <input type="text" class="form-control border-0 bg-transparent fs-16px" value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" disabled>
                            </div>
                        </div>


                        {{-- แผนก --}}
                        <div class="row ms-5 mt-1 ">
                            <label for="department" class="col-sm-2 col-form-label fw-bold">{{ ('แผนก : ') }}</label>
                            <div class="col-sm-3">
                                {{-- generate แผนก --}}
                                <input type="text" class="form-control border-0 bg-transparent fs-16px" value="{{ Auth::user()->department->name }}" disabled>
                            </div>
                        </div>
                    </div>


                        {{-- แถบเลือกประเภท --}}
                        <div class="row  dropwalfare">
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
                                {{-- generate จำนวนตามวงเงินแต่ละประเภท --}}
                                <input type="text" class="text-end form-control" value="{{ __('2,000.00') }}" disabled>
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท/คน') }}<label style="color:#fff">_______</label></label>


                        </div><br>


                        {{-- text-inputที่ใส่ชื่อหรือรหัสพนักงาน --}}
                        <div class="addpeople row ">
                            <div class="col">
                                <label>รายชื่อพนักงานเข้าร่วมกิจกรรม<hr style="margin-top: 0px"></label>
                            </div>
                        </div>
                        <div class="addpeople row">
                            <label for="budget" class="col-auto col-form-label">{{ __('เพิ่มสมาชิก : ') }}</label>
                            <div class="col-sm-4">
                                {{-- ช่องที่ต้องใส่หรือรหัสพนักงาน --}}
                                <input type="text" class="form-control" placeholder="{{ __('ชื่อ-นามสกุล,รหัสพนักงาน') }}">
                            </div>
                            <div class="col mt-1">
                                <button type="button" class="border-0 bg-transparent add-table"><img src="{{ URL::asset('img/add.png') }}" width="20" height="20"></button>

                            </div>
                            <div class="row">
                                <div class="col notation">
                                    <label>เพิ่มได้สูงสุด 20 คน</label>

                                </div>
                            </div>


                        </div>


                        <div >

                        </div>



                         {{-- ตารางสามชิก  --}}
                        <div class="row mt-3 d-flex justify-content-center g-0">
                            <div class="col-lg-11">
                                <table id="detail" class="table table-bordered ms-5">
                                    <thead class="bgcolor table-bordered ">
                                        <tr class="text-center">
                                            <th>ชื่อ-นามสกุล</th>
                                            <th>ตำแหน่ง</th>
                                        </tr>
                                    </thead>

                                    <tbody id="item-body" >
                                        <tr>
                                            {{-- ชื่อต้องแสดงตรงนี้ --}}
                                            <td><input type="text" name="item[]" class="form-control tableadd"></td>
                                            {{-- และต้อง generate ตำแหน่ง --}}
                                            <td><input type="text" name="price[]" class="form-control text-end tableadd"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col ">
                                <table class="deletetable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-buttom_body">
                                        <td>
                                            <button type="button" class="remove-table border-0 bg-transparent mt-3 "><img src="{{ URL::asset('img/delete.png') }}" width="25" height="20"></button>
                                        </td>
                                    </tbody>
                                </table>

                            </div>
                        </div>



                        {{-- จำนวนคนทั้งหมด ที่อยู่ข้างล่างตาราง --}}

                            <div class="row mt-3 ">
                                <label for="total" class="col-auto col-form-label ms-auto">จำนวนคนทั้งหมด : </label>
                                <div class="col-sm-2">
                                    {{-- คำนวณจำนวนคน --}}
                                    <input type="text" class="form-control text-end" value="{{ __('0') }}" readonly disabled>
                                </div>
                                <label for="id" class="col-auto col-form-label">{{ __('คน') }}<label style="color:#fff">_______-</label></label>
                            </div>






                        {{-- จำนวนเงินทั้งหมด ที่อยู่ข้างล่างตาราง --}}


                            <div class="row mt-3">
                                <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                                <div class="col-sm-2">
                                    {{-- คำนวณจำนวนเงิน --}}
                                    <input type="text" class="form-control text-end" value="{{ __('0.00') }}" readonly disabled>
                                </div>
                                <label for="id" class="col-auto col-form-label">{{ __('บาท') }}<label style="color:#fff">______-</label></label>
                            </div><br>








                        {{-- ปุ่มส่งเบิก --}}
                        <div class="row mt-3">
                            <div class="col-sm-2 ms-auto">
                                <button type="submit" class="btn btn-lg btn-success">ส่งคำขอ</button>
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
    var rowTableCount = 1;

    $(document).ready(function() {
        $(".add-file").click(function() {
            if (rowCount < 5)
            {
                var html = $(".clone").html();
                $(".increment").after(html);
                rowCount++;
            }

        })

        $("body").on("click",".remove-file", function() {
            rowCount--;
            $(this).parents(".control-group").remove();
        })

        $(".add-table").click(function() {

            if (rowTableCount < 10)
            {
                $('#item-body').append(
                    `<tr>
                        <td><input type="text" name="item[]" class="form-control tableadd"></td>
                        <td><input type="text" name="price[]" class="form-control text-end tableadd"></td>
                        </tr>`



                )

                rowTableCount++;
            }
        });
        $(".add-table").click(function() {

if (rowTableCount < 10)
{
    $('#item-buttom_body').append(
        ` <td>
             <button type="button" class="remove-table border-0 bg-transparent mt-3 "><img src="{{ URL::asset('img/delete.png') }}" width="25" height="20"></button>
        </td>`



    )

    rowTableCount++;
}
});

        $("#item-body").on('click', '.remove-table', function(element) {
            if (rowTableCount > 1) {
                $(this).parent().parent().remove();
                rowTableCount--;
            }
        })
    })
</script>
@endsection
