<div class="card-body">
<div class="row mt-3">
<!-- //กำหนดการเว้นระยะห่างจากหัว -->
                    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                    <!-- //กำหนด col และสร้างคำสถานะ -->
                    <div class="col-md-2">
                        <select class="form-control form-select" wire:model="report_status" wire:change="filter">
                                    <option selected="" value="1"> อนุมัติ </option>
                                        <option value="0">รออนุมัติ</option>
                        </select>
                        {{$report_status}}
                        <!-- //ตัวเลือกสำหรับสถานะ -->
                     </div>
                    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                    <!-- //ตัวเลือกสำหรับรูปแบบสวัสดิการ -->
                    <div class="col-md-2">
                        <select class="form-control form-select" wire:model="report_type" wire:change="filter">
                                        <option selected="" value="S">บุคคล</option>
                                        <option  value="G">สันทนาการ</option>
                        </select>
                        <!-- //ตัวเลือกสำหรับรูปแบบสวัสดิการ -->
                    </div>
                    <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
                    <!-- //กำหนด col และสร้างคำ ปี พ.ศ. -->
                    <div class="col-md-2">
                        <select class="form-control form-select" wire:model="report_year" wire:change="filter">
                                        <option selected="" value="999">ทั้งหมด</option>
                                        <option value="2566">2566</option>
                                        <option value="2565">2565</option>
                                        <option value="2564">2564</option>
                                        <option value="2563">2563</option>
                                        <option value="2562">2562</option>
                        </select>
                        <!-- //ตัวเลือกสำหรับ ปี พ.ศ. -->
                    </div>
                </div>