{{-- หน้าขอเบิกสวัสดิการแบบบุคคล --}}

@extends(((Auth::user()->type == "E") ? 'employees.v_employee_nav' : 'leaders.v_leader_nav'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="ti_wal fs-4">{{ __('เบิกสวัสดิการแบบสันทนาการ') }} <hr width="295" class="mb-2" style="margin-top: 0px"></div>

                <div class="card-body ">

                    <form method="POST" action="{{ route('create.single') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mx-5 px-4 py-3 mb-0 border-0 " style=" background-color: #eee;">
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
                                <input type="text" id="search" class="typeahead form-control" placeholder="{{ __('ชื่อ-นามสกุล,รหัสพนักงาน') }}">
                            </div>
                            <div class="col mt-1">
                                <button type="button" class="border-0 bg-transparent add-table"><img src="{{ URL::asset('img/add.png') }}" width="20" height="20" id = "btn_add"></button>
                            </div>
                            <div class="row">
                                <div class="col notation">
                                    <label>เพิ่มได้สูงสุด 20 คน</label>

                                </div>
                            </div>


                        </div>



                        {{-- ตารางสมาชิก --}}
                            <div class="row wfh mx-5">
                                <div class="col-sm-11 p-0">

                                        <table id="detail" class="table table-bordered w-100 bg-white" style="border-radius: 8px">
                                            <thead id="bg" >
                                                <tr class="text-center text-white" >
                                                    <th scope="col" class="col-sm-7 text-white">ชื่อ-นามสกุล</th>
                                                    <th scope="col" class="col-sm-4 text-white">ตำแหน่ง</th>
                                                </tr>
                                            </thead>

                                            <tbody id="b-detail">
                                                <tr >
                                                    <td><label id="tb-name"  type="text" name="item[]" class="form-control border-0"  style="color:#ffff">.</td>
                                                    <td><label type="text" name="price[]" class="form-control text-end border-0"></td>
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
                                                        <img src="{{ URL::asset('img/add.png') }}" width="27" height="27" hidden>
                                                    </button>
                                                </td>

                                            </tr>
                                        </thead>

                                        <tbody id="b-detail-2">
                                            <tr class="detail">
                                                <td class="border-0">
                                                    <button type="button" id="btn_delete_1" class="border-0 bg-transparent remove-row btn" onclick="deleteRow(this)">
                                                        <img src="{{ URL::asset('img/delete_group_requst.png') }}"  width="27" height="17">
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
                                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนคนทั้งหมด : </label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control text-end border-0 " style=" background-color: #eee;"
                                                value="{{ __('0.00') }}" readonly>
                                            </div>
                                            <label for="id" class="col-auto col-form-label me-5">{{('คน') }} <label style="color:#fff">__</label></label>
                                        </div>
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

                            <div class="row">
                                <div class="col-md-7 mx-5">
                                     {{-- แถบอัปโหลดใบเสร็จ --}}
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
    </div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var rowCount = 1;
    var fileCount = 1;

    function deleteRow(ele) {

        if (ele.id != '') {
            rowCount--;
           console.log("1");
           $("#tb-name").html('.')
           $("#tb-name").css('color','white')
        } else {
            var tb = ele.closest("tr");
            let row = tb.rowIndex;
            $(tb).remove();
            document.getElementById("b-detail").deleteRow(row-1);
            rowCount--;
            rowCount--;
        }

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

        $("#btn_add").click(function() {
            if (rowCount < 20) {
                if(rowCount > 1){
                    var l = $('#inp_add').val() /* เก็บค่าที่ Input มา */

                $('#b-detail').append(
                    `
                        <tr>
                        <td><label type="text" id="label_gen" name="item[]" class="form-control border-0" readonly></td>                /* นำข้อมูลที่จะเพิ่มลงมาใส่ในแต่ละช่อง */
                        <td><label type="text" name="price[]" class="form-control text-end border-0" readonly></td>      /* นำข้อมูลที่จะเพิ่มลงมาใส่ในแต่ละช่อง */
                    </tr>
                    `
                );
                $('#b-detail-2').append(
                    `
                    <tr class="detail">
                        <td class="border-0">
                            <button type="button" class="btn_delete border-0 bg-transparent remove-row btn" onclick="deleteRow(this)">
                                <img src="{{ URL::asset('img/delete_group_requst.png') }}"  width="27" height="17">
                            </button>
                        </td>
                    </tr>
                    `
                );
                if( $('#inp_add').val() != null){ /* นำค่าที่ Input มาใช้ */
                    $('#label_gen ').html(l )
                $('#label_gen ').css("color", "black" )
                }

            }
            else if(rowCount == 1){
                var x = $('#inp_add').val()
                console.log(x);
                $('#tb-name ').html(x )
                $('#tb-name ').css("color", "black" )
            }
                rowCount++;
            }
        });

        /* var path = "{{ url('/auto') }}";

        $('#search').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query
                }, function(data) {
                    return process(data);
                })
            }
        }) */
    });

</script>
@endsection
