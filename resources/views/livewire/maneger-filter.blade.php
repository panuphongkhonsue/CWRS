<div class="card-body">
                <div class="row mt-3" >
                    <!-- //กำหนดการเว้นระยะห่างจากด้านบน -->

                <div class ="col-auto margitext mt-3">
                     <label hidden>(ชื่อ-นามสกุล,รหัสพนักงาน,เลขที่ใบเบิก) :</label>
                     <!-- //กำหนด col สำหรับตัวค้นหา -->
                </div>
                    <div class="col-auto col-form-label mt-2">
                        <input type="text" class="form-control p-0 " placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" hidden>
                        <!-- //ช่องสำหรับการค้นหา -->
                    </div>
                        <div class ="col-auto mt-2 ">
                            <button class="btn p-0 status_b" type="button" id="button-addon2" hidden><img class="status_b p-0" src="{{ URL::asset('img/image.png') }}" width="15" height="15"></button>
                            <!-- //ไอคอนสำหรับค้นหาา -->
                        </div>
                    <label for="budget" class="col-auto mt-3"> สถานะ : </label>
                    <!-- //กำหนด col และสร้างคำสถานะ -->
                    <div class="col-md-2">
                        <select class="form-control form-select mt-2" wire:model='status' wire:change='filter'>
                                        <option selected=""  value="999">ทั้งหมด</option>
                                        <option value="2">รออนุมัติ</option>
                                        <option value="1">อนุมัติ</option>
                                        <option value="-1">ไม่อนุมัติ</option>
                        </select>
                        <!-- //ตัวเลือกสำหรับสถานะ -->
                     </div>
                    <label for="budget" class="col-auto mt-3 "> ปี พ.ศ. : </label>
                    <!-- //กำหนด col และสร้างคำ ปี พ.ศ. -->
                    <div class="col-md-2">
                        <select class="form-control form-select mt-2" wire:model='manage_year' wire:change='filter'>
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