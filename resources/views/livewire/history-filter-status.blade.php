<label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
<div class="col-md-2">
    <select class="form-control form-select" wire:model="welfare" wire:change="filter">
        <option value="999" >ทั้งหมด</option>
        <option value="0" >รออนุมัติ</option>
        <option value="1" >อนุมัติ</option>
        <option value="-2">ไม่อนุมัติ</option>
        <option value="-1" >ยกเลิก</option>                                            
    </select>
</div>
<!-- <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
<div class="col-md-2">
    <select class="form-control form-select">
        <option selected="" value="1">ทั้งหมด</option>
        <option value="2">บุคคล</option>
        <option value="3">สันทนาการ</option>                                                              
    </select>
</div>
<label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
<div class="col-md-2">
    <select class="form-control form-select">
        <option selected="" value="1">ทั้งหมด</option>
        <option value="2">2566</option>
        <option value="3">2565</option>
        <option value="4">2564</option>
        <option value="5">2563</option>
        <option value="6">2562</option>                                            
    </select>
</div> -->
