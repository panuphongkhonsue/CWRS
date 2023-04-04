{{-- หน้าหลักของพนักงาน --}}

@extends('employees.v_employee_nav')

@section('content')
        <div class="row justify-content-center">
            <div class="col-lg-5">

                {{-- ข้อกำหนดแบบบุคคล --}}
                <div class="card">
                    <div class="card-header fs-4 text-center text-light" id="bg">{{ __('ข้อกำหนดเบิกค่าสวัสดิการแบบบุคคล') }}</div>
                    <div class="card-body">
                        <div class="text-justify mx-3">
                            <div class="row">1. สิ่งที่เบิกต้องจัดอยู่ในประเภทสวัสดิการนั้นๆ</div><br>
                            <div class="row">2. ไม่สามารถเบิกสวัสดิการประเภทเดียวกันพร้อมกันได้</div><br>
                            <div class="row">3. กรณีต้องการยกเลิก สถานะของคำขอต้องเป็น "รออนุมัติ" เท่านั้น</div><br>
                            <div class="row">4. ต้องแนบหลักฐานใบเสร็จทุกครั้ง (สูงสุด 5 รูป)</div><br>
                            <div class="row">5. ต้องเบิกเต็มจำนวนวงเงินทั้งหมดของประเภทสวัสดิการนั้นๆ</div><br>
                            <div class="row mt-4 justify-content-md-center">
                                <div class="col-md-auto">
                                    <button class="btn btn-primary"><a href="{{ route('s.request') }}" class="text-light text-decoration-none" >บุคคล</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">

                {{-- ข้อกำหนดแบบสันทนาการ --}}
                <div class="card">
                    <div class="card-header fs-4 text-center text-light" id="bg">{{ __('ข้อกำหนดเบิกค่าสวัสดิการสันทนาการ') }} </div>
                    <div class="card-body">
                        <div class="text-justify mx-3">
                            <div class="row">1. ต้องมีสมาชิกร่วมเบิก 2 คนขึ้นไป</div><br>
                            <div class="row">2. สมาชิกทุกคนที่ร่วมเบิกต้องอยู่ในแผนกเดียวกัน</div><br>
                            <div class="row">3. ต้องผ่านการรับรองจา่กหัวหน้าแผนกเดียวกันเท่านั้น</div><br>
                            <div class="row">4. กรณีต้องการยกเลิก สถานะของคำขอต้องเป็น "รออนุมัติ" เท่านั้น</div><br>
                            <div class="row">5. ต้องเบิกเต็มจำนวนวงเงินทั้งหมดของประเภทสวัสดิการนั้นๆ</div><br>
                            <div class="row mt-4 justify-content-md-center">
                                <div class="col-md-auto">
                                    <button class="btn btn-primary">สันทนาการ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
