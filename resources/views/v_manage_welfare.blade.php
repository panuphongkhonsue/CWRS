@extends('humanresources.v_humanresource_nav')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="card-header fs-4 py-3">{{ __('จัดการสวัสดิการ') }}</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <label class="col-auto col-form-label">รูปแบบสวัสดิการ :</label>
                
                                <!-- ตัวเลือกหลายรายการของรูปแบบสวัสดิการ -->
                                <div class="col-sm-4">
                                    
                                    <livewire:filter-welfare/>
                                    
                                </div>
                            </div>
                        </div>
                
                        <!-- ปุ่มเพิ่มสวัสดิการ -->
                        <div class="col text-end">
                            <button type="button" class="btn btn-light rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#modal-add">เพิ่มประเภทสวัสดิการ</button>
                        </div>
                    </div>

                    <livewire:show-welfare/>

                    <!-- หน้าต่างแสดงผลซ้อนของปุ่มแก้ไขสวัสดิการ -->
                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.show_data').click(function() {
                row = $(this).parent().parent();
                console.log(row.rowindex);

                var type = row.find("td:eq(0)").text();
                var name = row.find("td:eq(1)").text();
                var budget = row.find("td:eq(2)").text();
                var id = row.find("td:eq(5)").text();

                $(".wel_title").val(name);
                $(".wel_budget").val(budget);
                $(".wel_id").val(id);

                if (type == 'บุคคล') {
                    document.getElementById("single").checked = true
                }

                if (type == 'สันทนาการ') {
                    document.getElementById("group").checked = true
                }
            })
        })
    </script>
@endsection