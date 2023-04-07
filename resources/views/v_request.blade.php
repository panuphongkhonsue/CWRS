{{-- หน้าขอเบิกสวัสดิการแบบบุคคล --}}

@extends(((Auth::user()->type == "E") ? 'employees.v_employee_nav' : 'leaders.v_leader_nav'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-13">
           {{--  กรอบพื้นหลัง --}}
            <div class="card">


                {{-- หัวข้อใบเบิก --}}
                <div class="i mx-5" style="line-height:20px">{{ __('เบิกสวัสดิการแบบบุคคล') }}
                    <hr width="295" class="mb-2">{{-- เส้นใต้ --}}
                </div>

                 <div class="card-body" style="padding: 0px 50px 50px 50px">

                    {{-- กรอบข้อมูล --}}
                    <form method="POST" action="{{ route('create.single') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mx-5 px-4 py-3 mb-0 border-0 " style=" background-color: #eee;">
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
                                <div class="col-sm-3">
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

                        {{-- แถบเลือกประเภท --}}
                        <div class="row mt-3 mx-5">
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <select class="form-control border-dark form-select" name="welfare" id="welfare">
                                    <option selected disabled>เลือกประเภทสวัสดิการ</option>
                                    {{-- 3 บรรทัดนี้ ห้ามแก้ --}}
                                    @foreach ($welfares as $welfare)
                                        <option value='{"id":{{ $welfare->id }}, "budget":{{ $welfare->budget }}}'>{{ $welfare->title }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- จำนวนเงิน --}}
                            <label for="budget" class="col-auto col-form-label ms-auto ">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" id="money" class="text-end form-control border-0" style=" background-color: #eee;"
                                 value="{{ __('0.00') }}">
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        {{-- หัวข้อรายละเอียด + หมายเหตุ --}}
                        <div class="row mt-3 fs-5 mx-5">
                            <div class="col-md-4">
                                รายละเอียดการขอเบิกสวัสดิการ
                                <hr width="255" class="my-0">
                                <div class="text-danger mb-2" style="font-size: 13px">จำนวนสูงสุด 10 รายการ</div>
                            </div>
                        </div>


                        {{-- ตารางรายละเอียด --}}
                            <div class="row wfh mx-5">
                                <div class="col-sm-11 p-0">

                                        <table id="tb" class="table table-bordered border-dark rounded">
                                            <thead id="bg" >
                                                <tr class="text-center text-white" >
                                                    <th scope="col" class="col-sm-7 text-white">รายละเอียด</th>
                                                    <th scope="col" class="col-sm-4 text-white">จำนวนเงิน (บาท)</th>
                                                </tr>
                                            </thead>

                                            <tbody id="b-detail">
                                                <tr>
                                                    <td><input type="text" name="item[]" class="form-control border-0" placeholder="กรอกรายละเอียด" required autofocus></td>
                                                    <td><input type="number" name="price[]" class="form-control text-end border-0 price" onchange="updateTotal()" placeholder="กรอกราคา" required autofocus></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                </div>
                                <div class="col-sm-1 mx-auto ">

                                    {{-- ปุ่มรายเพิ่มตาราง ลบตาราง --}}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td class="border-0">
                                                    <button type="button" class="add-row border-0 bg-transparent ms-1">
                                                        <img src="./img/add.png" width="27" height="27">
                                                    </button>
                                                </td>
                                            </tr>
                                        </thead>

                                        <tbody id="b-detail-2">
                                            <tr class="detail">
                                                <td class="border-0">
                                                    <button type="button" class="border-0 bg-transparent remove-row btn" onclick="deleteRow(this)">
                                                        <img src="./img/delete_group_requst.png"  width="27" height="17">
                                                   </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 ms-auto">
                                    <div class=" p-0">
                                        {{-- จำนวนเงินทั้งหมด ที่อยู่ข้างล่างตาราง --}}
                                        <div class="row ">
                                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                                            <div class="col-sm-2">
                                                <input type="text" id="total" class="form-control text-end border-0" style=" background-color: #eee;"
                                                value="{{ __('0.00') }}" readonly>
                                            </div>
                                            <label for="id" class="col-auto col-form-label me-5">{{ __('บาท') }} <label style="color:#fff">_</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            @error('filename')
                                <div class="row mx-5">
                                    <div class="col-md-3 alert alert-danger fs-7">{{ $message }}</div>
                                </div>
                            @enderror

                            <div class="row">
                                <div class="col-md-7 mx-5">
                                     {{-- แถบอัปโหลดใบเสร็จ --}}
                                    {{-- แถบอัปโหลดใบเสร็จ --}}
                                <div class="row mt-3 control-group increment">
                                    <label for="bill" class="col-auto col-form-label">อัปโหลดใบเสร็จ : </label>
                                        <div class="col-sm-5">
                                            <input type="file" name="filename[]" class="form-control file @error('filename') is-invalid @enderror" value="อัปโหลดไฟล์" accept=".jpeg, .pdf, .jpg">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-success add-file" type="button">+</button>
                                        </div>
                                </div>

                                {{-- ตรงนี้คือตอนกด + เพิ่มไฟล์ --}}
                                <div class="clone hide" hidden>
                                    <div class="row mt-3 control-group" style="margin-left: 120px">
                                        <div class="col-sm-5">
                                            <input type="file" name="filename[]" class="form-control file  @error('filename') is-invalid @enderror" value="อัปโหลดไฟล์" accept=".jpeg, .pdf, .jpg">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-danger remove-file">-</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>


                        {{-- ปุ่มส่งเบิก --}}
                        <div class="row">
                            <div class="col-sm-2 ms-auto">
                                <button type="submit" class="btn btn-success">ส่งเบิก</button>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var rowCount = 1;
    var fileCount = 1;

    function deleteRow(ele) {
        if (rowCount > 1) {
            var tb = ele.closest("tr");
            let row = tb.rowIndex;

            $(tb).remove();
            document.getElementById("b-detail").deleteRow(row-1);
            rowCount--;
            updateTotal();
        }
    }

    function updateTotal() {
        var col = document.getElementsByClassName("price");
        let total = 0;

        for (let i = 0 ; i < col.length ; i++) {
            total = total +  Number($(col[i]).val());
        }

        let fixed = total.toLocaleString('en-US') + ".00";
        $("#total").val(fixed);
    }

    $(document).ready(function() {

        $(".add-file").click(function() {
            if (fileCount < 5)
            {
                var html = $(".clone").html();
                $(".increment").after(html);
                fileCount++;
            }
        });

        $("body").on("click",".remove-file", function() {
            fileCount--;
            $(this).parents(".control-group").remove();
        });

        $(".add-row").click(function() {
            if (rowCount < 10) {
                $('#b-detail').append(
                    `
                    <tr>
                        <td><input type="text" name="item[]" class="form-control border-0" required autofocus></td>
                        <td><input type="number" name="price[]" class="form-control text-end border-0 price" required autofocus onchange="updateTotal()"></td>
                    </tr>
                    `
                );

                $('#b-detail-2').append(
                    `
                    <tr class="detail">
                        <td class="border-0">
                            <button type="button" class="border-0 bg-transparent remove-row btn" onclick="deleteRow(this)">
                                <img src="./img/delete_group_requst.png"  width="27" height="17">
                            </button>
                        </td>
                    </tr>
                    `
                );
                rowCount++;
            }
        });

        $('#welfare').change(function() {
            var val = $(this).val();
            var text = JSON.parse(val);
            var fixed = text.budget.toLocaleString('en-US') + ".00";

            $("#money").val(fixed);
        })
    });

</script>
@endsection
