<div class="row mt-3">
    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
    <div class="col-md-2">
        <select class="form-control form-select" wire:model="emp_status" wire:change="filter"> 
            <option value="999" >ทั้งหมด</option>
            <option value="0" >รออนุมัติ</option>
            <option value="1" >อนุมัติ</option>
            <option value="-2">ไม่อนุมัติ</option>
            <option value="-1" >ยกเลิก</option>                                            
        </select>
    </div>
    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
    <div class="col-md-2">
        <select class="form-control form-select" wire:model="walfare_type" wire:change="filter">
            <option selected="" value="999">ทั้งหมด</option>
            <option value="S">บุคคล</option>
            <option value="G">สันทนาการ</option>                                                              
        </select>
    </div>
    <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
    <div class="col-md-2">
        <select class="form-control form-select" wire:model="walfare_year" wire:change="filter">
            <option selected="" value="999">ทั้งหมด</option>
            <option value="2023">2566</option>
            <option value="2022">2565</option>
            <option value="2021">2564</option>
            <option value="2020">2563</option>
            <option value="2019">2562</option>                                            
        </select>
    </div>
</div>