<div class="row">
    {{-- ข้อความ --}}
    <div class="aa col-auto mt-2">
        <label class="oo" hidden>(ชื่อ-นามสกุล,รหัสพนักงาน,เลขที่ใบเบิก) :</label>
    </div>

        {{-- กล่องค้นหา --}}
    <div class="col-auto ll mt-2">
        <input wire:model="query" wire:keyup.debounce="query" type="text" class="form-control  jj" placeholder=""
                aria-label="Recipient's username" aria-describedby="button-addon2"
                style="height: 30px" hidden>
    </div>
    {{-- ปุ่มค้นหา --}}
    <div class="ll col-auto ">
        <button class="btn" type="button" id="button-addon2"><img src="./img/image1.png"
                width="18" height="18" hidden></button>
    </div>

    {{-- ข้อความ --}}
    <div class="col-auto  mt-1">
        <label for="budget" class="col-auto col-form-label oo" style="margin-left: 260px ">
            รูปแบบสวัสดิการ : </label>
    </div>

    {{-- ตัวเลือกรายหลายการ : รูปแบบสวัสดิการ --}}
    <div class="col-auto mt-2">
        <select class="form-control form-select colortext" wire:model='manage_type' wwire:change = 'filter'
            style="height: 34px">
            <option selected=""value="999"> ทั้งหมด </option>

            <option value="S">บุคคล</option>
            <option value="G">สันทนาการ</option>
        </select>

    </div>

    {{-- ข้อความ --}}
    <div class="col-auto mt-1">
        <label for="budget" class="col-auto col-form-label oo"> ปี พ.ศ. : </label>
    </div>

    {{-- ตัวเลือกรายหลายการ : ปีพ.ศ.ย้อนหลัง5ปี รวมปีปัจจุบัน --}}
    <div class="col-auto mt-2 ">
        <select class="form-control form-select colortext " wire:model='manage_year' wwire:change = 'filter'
            style="height: 34px">
            <option selected="" value="999">ทั้งหมด</option>
            <option value="2566">2566</option>
            <option value="2565">2565</option>
            <option value="2564">2564</option>
            <option value="2563">2563</option>
            <option value="2562">2562</option>
        </select>
    </div>
</div><br>
