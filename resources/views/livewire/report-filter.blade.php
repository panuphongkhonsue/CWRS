<div class="row mt-3">
    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
    <div class="col-md-2">
        <select class="form-control form-select" wire:model="report_status" wire:change="filter">
            <option selected="" value="1"> อนุมัติ </option>
            <option value="0">รออนุมัติ</option>
        </select>
    </div>
    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
    <div class="col-md-2">
        <select class="form-control form-select" wire:model="report_type" wire:change="filter">
            <option value="S" selected="">บุคคล</option>
            <option value="G">สันทนาการ</option>
        </select>
    </div>
</div>
