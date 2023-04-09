{{-- หน้าขอเบิกสวัสดิการแบบบุคคล --}}

@extends(Auth::user()->type == 'E' ? 'employees.v_employee_nav' : 'leaders.v_leader_nav')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="ti_wal fs-4">{{ __('เบิกสวัสดิการแบบสันทนาการ') }}
                    <hr width="295" class="mb-2" style="margin-top: 0px">
                </div>

                <div class="card-body ">

                    <form id = "form_reGroup" method="POST" action="{{ route('create_group') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mx-5 px-4 py-3 mb-0 border-0 " style=" background-color: #eee;">
                            {{-- วันที่ --}}
                            <div class="row">
                                <label for="budget"
                                    class="col-auto col-form-label ms-auto fw-bolder ">{{ 'วัน/เดือน/ปี : ' }}</label>
                                <div class="col-sm-2">
                                    {{-- generate วันที่ --}}
                                    <input type="text" id="date" name="date"
                                        class="form-control border-0 bg-transparent fs-16px" value="{{ date('d/m/Y') }}">
                                </div>
                            </div>

                            {{-- รหัสพนักงาน --}}
                            <div class="row ms-5 mt-1">
                                <label for="id" class="col-sm-2 col-form-label fw-bold">{{ 'รหัสพนักงาน : ' }}</label>
                                <div class="col-sm-3">
                                    {{-- generate รหัสพนักงาน --}}
                                    <input name="user-id" type="text"
                                        class="form-control border-0 bg-transparent fs-16px" value="{{ Auth::user()->id }}"
                                        disabled>
                                </div>
                            </div>

                            {{-- ชื่อ นามกุล --}}
                            <div class="row ms-5 mt-1">
                                <label for="name" class="col-sm-2 col-form-label fw-bold ">{{ 'ชื่อ-สกุล : ' }}</label>
                                <div class="col-sm-3">
                                    {{-- generate ชื่อ-นามสกุล --}}
                                    <input type="text"
                                        class="form-control border-0 bg-transpa
                                rent fs-16px"
                                        value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" disabled>
                                </div>
                            </div>


                            {{-- แผนก --}}
                            <div class="row ms-5 mt-1 ">
                                <label for="department" class="col-sm-2 col-form-label fw-bold">{{ 'แผนก : ' }}</label>
                                <div class="col-sm-3">
                                    {{-- generate แผนก --}}
                                    <input type="text" class="form-control border-0 bg-transparent fs-16px"
                                        value="{{ Auth::user()->department->name }}" disabled>
                                </div>
                            </div>
                        </div>

                        {{-- แถบเลือกประเภท --}}
                        <div class="row mt-3 mx-5">
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <select class="form-control border-dark form-select" name="welfare" id="welfare"
                                    onclick="updateTotal()">
                                    <option selected disabled>เลือกประเภทสวัสดิการ</option>

                                    {{-- 3 บรรทัดนี้ ห้ามแก้ --}}
                                    @foreach ($welfares as $welfare)
                                        <option value='{"id":{{ $welfare->id }}, "budget":{{ $welfare->budget }}}'>
                                            {{ $welfare->title }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- จำนวนเงิน --}}
                            <label for="budget"
                                class="col-auto col-form-label ms-auto ">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input name="wel-budget" type="text" id="money"
                                    class="text-end form-control border-0" style=" background-color: #eee;"
                                    value="{{ __('0.00') }} ">
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>
                        <br>


                        {{-- text-inputที่ใส่ชื่อหรือรหัสพนักงาน --}}
                        <div class="addpeople row ">
                            <div class="col">
                                <label>รายชื่อพนักงานเข้าร่วมกิจกรรม
                                    <hr style="margin-top: 0px">
                                </label>
                            </div>
                        </div>
                        <div class="addpeople row">
                            <label for="budget" class="col-auto col-form-label">{{ __('เพิ่มสมาชิก : ') }}</label>
                            <div class="col-sm-4 mt-2">
                                {{-- ช่องที่ต้องใส่หรือรหัสพนักงาน --}}
                                <select class="get_user_name form-control" name="userselect" id="get_user">
                                    <option selected disabled>ชื่อ-นามสกุล,รหัสพนักงาน</option>
                                    @foreach ($departments_user as $user)
                                        <option
                                            value="{{ $user->id }}|{{ $user->fname }}|{{ $user->lname }}|{{ $user->role->name }}">
                                            {{ $user->id }} - {{ $user->fname }} {{ $user->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col mt-2 mr-2 ps-1">
                                <button type="button" class="border-0 bg-transparent add-table"><img
                                        src="{{ URL::asset('img/add.png') }}" width="20" height="20"
                                        id="btn_add"></button>
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

                                <table id="detail" class="table table-bordered w-100 bg-white"
                                    style="border-radius: 8px">
                                    <thead id="bg">
                                        <tr class="text-center text-white">
                                            <th scope="col" class="col-sm-7 text-white">ชื่อ-นามสกุล</th>
                                            <th scope="col" class="col-sm-4 text-white">ตำแหน่ง</th>
                                        </tr>
                                    </thead>

                                    <tbody id="b-detail">
                                        <tr>
                                            <td class="count_people"><input id="tb-name" type="text" name="user_info[]"
                                                    class="form-control border-0 bg-white us"></td>
                                            <td class="count_role form-control text-end border-0"><label id="tb-role"
                                                    type="text" name="role[]" class="form-control text-end border-0">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-sm-1 mx-auto">

                                {{-- ปุ่มรายเพิ่มตาราง ลบตาราง --}}
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <td class="border-0">
                                                <button type="button" class="add-row border-0 bg-transparent ms-1">
                                                    <img src="{{ URL::asset('img/add.png') }}" width="27"
                                                        height="27" hidden>
                                                </button>
                                            </td>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 ms-auto">
                                <div class=" p-0">
                                    <div class="debtn mb-2 pb-2">
                                        <button type="button" id="btn_delete_1"
                                                    class="btn_delete border-0 bg-transparent remove-row btn"
                                                    onclick="deleteRow(this)">
                                                    <img src="{{ URL::asset('img/delete_group_requst.png') }}"
                                                        width="27" height="17">
                                    </div>
                                    {{-- จำนวนเงินทั้งหมด ที่อยู่ข้างล่างตาราง --}}
                                    <div class="get_user">
                                        <input type="text" id="us_id" class="id_user_table" name="get_user_id[]"
                                            hidden>
                                    </div>
                                    <div class="row ">
                                        <label for="total" class="col-auto col-form-label ms-auto">จำนวนคนทั้งหมด :
                                        </label>
                                        <div class="col-sm-2">
                                            <input name="num_peo" type="text" class="form-control text-end border-0"
                                                id="total_people" style=" background-color: #eee;"
                                                value="{{ __('0') }}" readonly>
                                        </div>
                                        <label for="id" class="col-auto col-form-label me-5">{{ 'คน' }}
                                            <label style="color:#fff">__</label></label>
                                    </div>
                                    <div class="row ">
                                        <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด :
                                        </label>
                                        <div class="col-sm-2">
                                            <input name="total_money" type="text"
                                                class="form-control text-end border-0" id="total_money"
                                                style=" background-color: #eee;" value="{{ __('0.00') }}" readonly>
                                        </div>
                                        <label for="id" class="col-auto col-form-label me-5">{{ __('บาท') }}
                                            <label style="color:#fff">_</label></label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- ปุ่มส่งเบิก --}}
                        <div class="row">
                            <div class="col-sm-2 ms-auto">
                                <button type = "button" class="btn btn-success" id ="mmn">ส่งเบิก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var rowCount = 0;
        var num1 = '';
        var num2 = '';
        var id = [];
        var element_name = [];

        function
        deleteRow(ele) {
            var selected_option = document.getElementById("get_user").options[document.getElementById("get_user").selectedIndex];
            var selected_near_option = document.getElementById("get_user");
            var length_count = $('.count_people').length;
            if (length_count == 1 ) {
                var button_index = getRowIndex(ele)
                var selected_option = document.getElementById("get_user").options[document.getElementById("get_user")
                    .selectedIndex];
                $(".count_people").val('.')
                $(".count_people").css('color', 'white')
                $(".count_role").html(' ')
                $(".count_role").css('color', 'white')
                num1 = 'a';
                rowCount = 0;

                if (rowCount == 0) {
                    var selected_option = document.getElementById("get_user");
                    for (let index = 0; index < selected_option.length; index++) {
                        if (index != 0) {
                            selected_option.options[index].disabled = false;
                        }
                    }
                    $('#b-detail').html(
                            `
                        <tr>
                        <td class="count_people"><label type="text" id="tb-name" name="user_info[]" form-control border-0 bg-white us" readonly></td>                /* นำข้อมูลที่จะเพิ่มลงมาใส่ในแต่ละช่อง */
                        <td class="count_role"><label type="text" id="tb-role" name="role[]" class="form-control border-0 bg-white us" readonly></td>      /* นำข้อมูลที่จะเพิ่มลงมาใส่ในแต่ละช่อง */
                    </tr>
                    `
                        );
                }

                updateTotal();
                if (rowCount > -1) { // only splice array when item is found
                    id.splice(0, 1); //
                }
                console.log("Rowcount = " + rowCount);
                $("#us_id").val(id);
                console.log("index = " + button_index);

            } else {
                var selected_option = document.getElementById("get_user").options[document.getElementById("get_user").selectedIndex];
                var button_index = getRowIndex(ele)
                //เรียกฟังก์ชันหา indexจากปุ่มที่กด
                var tb = ele.closest("tr");
                // let row = tb.rowIndex;
                $(tb).remove();
                document.getElementById("b-detail").deleteRow(rowCount - 1);
                rowCount--;
                console.log("RowCount = " + rowCount);

                // console.log($('#tb-name'))
                selected_option.disabled = false;
                updateTotal();
                if (rowCount > -1) { // only splice array when item is found
                    id.splice(button_index - 1, 1);
                }
                num2 = 's';
                // $("#us_id").val(id);
                console.log("index = " + button_index);
            }
        }

        function updateTotal() {
            let total = Number($("#money").val().replace(/[^0-9.-]+/g, "")) * rowCount;
            let fixed = total.toLocaleString('en-US') + ".00";
            $("#total_money").val(fixed);
            $("#total_people").val(rowCount);

        }

        //ฟังก์ชันหา index ของ ปุ่มลบ
        function getRowIndex(button) {
            var row = button.parentNode.parentNode;
            var rowIndex = row.rowIndex;
            return rowIndex;
        }



        // function disable_select() {
        //     // Get the selected option element
        //     var selected_option = document.getElementById("get_user").options[document.getElementById("get_user").selectedIndex];

        //     // Disable the selected option
        //     selected_option.disabled = true;
        // }

        function check_table() {
            if (rowCount < 2) {
                alert("ต้องมีสมาชิก 2 คนขึ้นไป");
            }
        }


        $(document).ready(function() {
            $("#btn_add").click(function() {
                if (rowCount < 20) {
                    console.log($('#get_user').val());
                    if (rowCount > 0 && $('#get_user').val() != null) {
                        var l = $('#get_user').val(); /* เก็บค่าที่ Input มา */
                        var i = rowCount;
                        $('#b-detail').append(
                            `
                        <tr>
                        <td class="count_people"><label type="text" id="name_gen`+ i +`" name="user_info[]" class="form-control border-0" readonly></td>                /* นำข้อมูลที่จะเพิ่มลงมาใส่ในแต่ละช่อง */
                        <td class="count_role"><label type="text" id="role_gen`+ i +`" name="role[]" class="form-control border-0 bg-white us text-end" readonly></td>      /* นำข้อมูลที่จะเพิ่มลงมาใส่ในแต่ละช่อง */
                    </tr>
                    `
                        );
                        /* นำค่าที่ Input มาใช้ */
                        var selected_option = document.getElementById("get_user").options[document
                            .getElementById("get_user").selectedIndex];

                        var text = l.split('|');
                        var name = text[1] + " " + text[2];
                        var role = text[3];
                        id.push(text[0]);
                        $('#name_gen'+i).html(name)
                        $('.count_people').css("color", "black")
                        $('#role_gen'+i).html(role)
                        $('.count_role').css("color", "black")
                        rowCount++;
                        selected_option.disabled = true;

                        updateTotal();
                    } else if (rowCount == 0 && $('#get_user').val() != null) {
                        var selected_option = document.getElementById("get_user").options[document
                        .getElementById("get_user").selectedIndex];
                        var x = $('#get_user').val();
                        var text = x.split('|');
                        var name = text[1] + " " + text[2];
                        var role = text[3];
                        id.push(text[0]);
                        $('#tb-name').val(name)
                        $('.count_people').css("color", "black")
                        $('#tb-role').html(role)
                        $('.count_role').css("color", "black")

                        // disable_select();
                        rowCount++;

                        selected_option.disabled = true;

                        updateTotal();
                    }
                    $("#us_id").val(id);
                    console.log($("#us_id").val())
                }
            });

            $('#welfare').change(function() {
                var val = $(this).val();
                var text = JSON.parse(val);
                var budget = Number(text.budget);
                var fixed = budget.toFixed(2);

                $("#money").val(Intl.NumberFormat('en-US').format(fixed));
            })

            $('.get_user_name').select2({
                inimumResultsForSearch: 5
            });

        });
    </script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
<link rel="stylesheet" href="{{ URL::asset('/css/home.css') }}">
<script>
$("#mmn").click(function() {
    Swal.fire({
  title: 'คุณแน่ใจหรือไม่ ?',
  text: 'คุณต้องการยืนยันการเบิกสวัสดิการหรือไม่',
  imageUrl: '{{ URL::asset('img/aleart1.png') }} ',
  imageWidth: 150,
  imageHeight: 150,
  denyButtonText: 'ยกเลิก',
  confirmButtonText: 'ยืนยัน',
  confirmButtonColor: '#32cd32',
  denyButtonColor: '#ff0000',
  showDenyButton: true,
  showCloseButton: true,
  reverseButtons: true,
  customClass: {
    confirmButton: 'confirm-button-class',
    denyButton: 'deny-button-class'
  },
  preConfirm: () => {
    document.getElementById('form_reGroup').submit();
  }
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
  imageUrl: '{{ URL::asset('img/correct-1.png') }} ',
  title: 'สำเร็จ',
  text: 'คุณยืนยันการเบิกสวัสดิการสำเร็จ',
  showConfirmButton: false,
  imageWidth: 150,
  imageHeight: 150,
  timer: 1500
})
} else if (result.isDenied) {
    Swal.fire({
  imageUrl: '{{ URL::asset('img/cancel_welfare.png') }} ',
  title: 'ไม่สำเร็จ',
  showConfirmButton: false,
  text: 'คุณยืนยันการเบิกสวัสดิการไม่สำเร็จ',
  imageWidth: 150,
  imageHeight: 150,
  timer: 1500
})
  }
})
});
</script>
@endsection