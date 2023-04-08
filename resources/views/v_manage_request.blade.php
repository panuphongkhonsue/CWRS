@extends('humanresources.v_humanresource_nav')

@section('content')
<div class="row">
    <div class="col-lg-13">

         <livewire:request-filter/>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-md-13">
                        <div class="row">
                            {{-- ข้อความ --}}
                            <div class="aa col-auto mt-2">
                                <label class="oo">(ชื่อ-นามสกุล,รหัสพนักงาน,เลขที่ใบเบิก) :</label>
                            </div>

                             {{-- กล่องค้นหา --}}
                            <div class="col-auto ll mt-2">
                                <input type="text" class="form-control  jj" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" style="height: 30px">
                            </div>

                            {{-- ปุ่มค้นหา --}}
                              <div class="ll col-auto ">
                                <button class="btn" type="button" id="button-addon2"><img src="./img/image1.png" width="18" height="18"></button>
                              </div>

                              {{-- ข้อความ --}}
                              <div class="col-auto  mt-1">
                                <label for="budget" class="col-auto col-form-label oo" style="margin-left: 260px "> รูปแบบสวัสดิการ : </label>
                              </div>

                              {{-- ตัวเลือกรายหลายการ : รูปแบบสวัสดิการ --}}
                              <div class="col-auto mt-2">
                                <select class="form-control form-select colortext" name="welfare" id="welfare" style="height: 34px">
                                            <option selected=""value ="1" > ทั้งหมด </option>

                                                <option value="2">บุคคล</option>
                                                <option value="3">สันทนาการ</option>
                                </select>

                              </div>

                              {{-- ข้อความ --}}
                              <div class="col-auto mt-1">
                                <label for="budget" class="col-auto col-form-label oo"> ปี พ.ศ. : </label>
                              </div>

                              {{-- ตัวเลือกรายหลายการ : ปีพ.ศ.ย้อนหลัง5ปี รวมปีปัจจุบัน --}}
                              <div class="col-auto mt-2 ">
                                <select class="form-control form-select colortext " name="welfare" id="welfare" style="height: 34px" >
                                                <option selected="" value="1">ทั้งหมด</option>
                                                <option value="2">2566</option>
                                                <option value="3">2565</option>
                                                <option value="4">2564</option>
                                                <option value="5">2563</option>
                                                <option value="6">2562</option>
                                </select>
                        </div>
                        </div><br>


                        {{-- ในส่วนของตาราง --}}
                            <livewire:request-show/>

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-5 ms-auto text-end">
                        {{ __('หมายเหตุ')  }}
                        &nbsp; {{ __(':')}}
                        &nbsp;
                        <img src="./img/approve.png" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('อนุมัติ') }}
                        &nbsp;
                        <img src="./img/cancel.png" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('ไม่อนุมัติ') }}
                        &nbsp;
                        <img src="./img/wait.png" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('รออนุมัติ') }}
                        &nbsp;
                        <img src="./img/cancel2.png" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('ยกเลิก') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    var head = document.getElementsByClassName("ft");
    for (let i = 0 ; i < head.length ; i++) {
        head[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        })
    }
</script>
@endsection
