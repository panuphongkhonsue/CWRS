<div>
    <div class="row">
        <div class="col">
            <div class="row">
                <label class="col-auto col-form-label">รูปแบบสวัสดิการ :</label>

                <!-- ตัวเลือกหลายรายการของรูปแบบสวัสดิการ -->
                <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example" wire:model="type" wire:change="render">
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
    {{ $welfares->links() }}
</div>
