<div>
    <div class="row">
        <div class="col">
            <div class="row">
                <label class="col-auto col-form-label">รูปแบบสวัสดิการ :</label>

                <!-- ตัวเลือกหลายรายการของรูปแบบสวัสดิการ -->
                <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example" wire:model="type" wire:change="filter">
                        <option value="999">ทั้งหมด</option>
                        <option value="S">บุคคล</option>
                        <option value="G">สันทนาการ</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- ปุ่มเพิ่มสวัสดิการ -->
        <div class="col text-end">
            <button type="button" class="btn btn-light rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#modal-add">เพิ่มประเภทสวัสดิการ</button>
        </div>
    </div>
    {{-- Stop trying to control. --}}
    <table class="table table-bordered align-items-center mt-3 table-striped">

        <!-- หัวข้อตาราง -->
        <thead class="text-center text-light" id="bg">
            <tr>
                <td scope="col" class="col-sm-2">รูปแบบสวัสดิการ</td>
                <td scope="col">ประเภทสวัสดิการ</td>
                <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                <td scope="col" class="col-sm-2">ผู้เพิ่มสวัสดิการ</td>
                <td scope="col" class="col-sm-1">แก้ไข</td>
            </tr>
        </thead>

        <!-- ข้อมูลในตาราง -->
        <tbody>
            @foreach ($welfares as $welfare)
                <tr>
                    @switch($welfare->type)
                        @case('S')
                            @php ($text = "บุคคล")
                            @break
                        @case('G')
                            @php ($text = "สันทนาการ")
                            @break
                    @endswitch
                    <td scope="col" class="text-center">{{ $text }}</td>
                    <td scope="col" class="title">{{ $welfare->title }}</td>
                    <td scope="col" class="text-end budget">{{ $welfare->budget }}</td>
                    <td scope="col" class="text-center">{{ $welfare->user->fname }}</td>
                    <td scope="col" class="text-center"><button type="button" class="show_data btn btn-sm btn-warning text-light" data-bs-toggle="modal" data-bs-target="#modal-in">แก้ไข</button></td>
                    <td class="d-none">{{ $welfare->id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $welfares->links() !!}

    <div class="modal fade" id="modal-in" tabindex="-1" role="dialog" aria-labelledby="content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered py-3" role="document">
          <div class="modal-content">
            <div class="modal-header navbar">
              <h5 class="modal-title ms-auto me-auto text-light" id="content">แก้ไขสวัสดิการ</h5>
            </div>
            <div class="modal-body mt-3 pb-3">
                <form id="welfare_edit" method="POST" action="{{ route('edit_welfare') }}">
                    @csrf
                    <input type="text" class="wel_id d-none" name="e_id">
                    <div class="row">
                        <label for="" class="col-auto col-form-label">ประเภทสวัสดิการ :</label>
                        <div class="col">
                            <input type="text" class="form-control wel_title" name="e_title">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="" class="col-auto col-form-label">จำนวนเงินที่เบิกได้ :</label>
                        <div class="col">
                            <input type="text" class="form-control wel_budget" name="e_budget">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="" class="col-auto form-check-label">รูปแบบสวัสดิการ :</label>
                        <div class="col-auto form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="type_edit" id="single" disabled>
                            <label class="form-check-label" for="type1">
                              บุคคล
                            </label>
                          </div>
                          <div class="col form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type_edit" id="group" disabled>
                            <label class="form-check-label" for="type2">
                              สันทนาการ
                            </label>
                          </div>
                    </div>
                </form>
            </div>

            <!-- ปุ่มยกเลิกและบันทึกหน้าต่างแสดงผลซ้อนของปุ่มแก้ไข -->
            <div class="modal-footer border-0 mt-1">
                <button type="button" class="btn btn-danger me-md-5" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" form="welfare_edit" class="btn btn-success">บันทึก</button>
            </div>
          </div>
        </div>
    </div>

    <!-- หน้าต่างแสดงผลซ้อนของปุ่มเพิ่มสวัสดิการ -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="content" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered py-3" role="document">
          <div class="modal-content">
            <div class="modal-header navbar">
              <h5 class="modal-title ms-auto me-auto text-light" id="content">เพิ่มสวัสดิการ</h5>
            </div>
            <div class="modal-body mt-3 pb-3">
                <form id="welfare_add" action="{{ route('add_welfare') }}" method="POST">
                    @csrf
                    <div class="row">
                        <label for="" class="col-auto col-form-label">ประเภทสวัสดิการ :</label>
                        <div class="col">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="" class="col-auto col-form-label">จำนวนเงินที่เบิกได้ :</label>
                        <div class="col">
                            <input type="text" class="form-control" name="budget">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="" class="col-auto form-check-label">รูปแบบสวัสดิการ :</label>
                        <div class="col-auto form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="type" id="single1" value="S">
                            <label class="form-check-label" for="type1">
                              บุคคล
                            </label>
                          </div>
                          <div class="col form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="group1" value="G">
                            <label class="form-check-label" for="type2">
                              สันทนาการ
                            </label>
                          </div>
                    </div>
                </form>
            </div>

            <!-- ปุ่มยกเลิกและบันทึกหน้าต่างแสดงผลซ้อนของปุ่มเพิ่มสวัสดิการ -->
            <div>
                <div class="modal-footer border-0 mt-1">
                    <button type="button" class="btn btn-danger me-md-5" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" form="welfare_add" class="btn btn-success" value="Submit">บันทึก</button>
                </div>
            </div>

          </div>
        </div>
    </div>

</div>

