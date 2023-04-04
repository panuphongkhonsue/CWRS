@extends('humanresources.v_humanresource_nav')

@section('content')
<div class="container">
    <div class="col-lg-13">
        <div class="card">              
            <div class="card-header fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}</div>
            <div class="card-body">
                <div class="row mt-3">
                    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> รออนุมัติ </option> 
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">รออนุมัติ</option>
                                        <option value="3">อนุมัติ</option>
                                        <option value="4">ไม่อนุมัติ</option>
                                        <option value="5">ยกเลิก</option>                                            
                        </select>
                     </div>
                    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> ทั้งหมด </option> 
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">บุคคล</option>
                                        <option value="3">สันทนาการ</option>                                                              
                        </select>

                </div>
                <label for="budget" class="col-auto col-form-label"> ปี พ.ศ. : </label>
                <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> ทั้งหมด </option> 
                                        <option value="1">ทั้งหมด</option>
                                        <option value="2">2566</option>
                                        <option value="3">2565</option>
                                        <option value="4">2564</option>
                                        <option value="5">2563</option>
                                        <option value="6">2562</option>                                            
                        </select>
                </div>
                </div>
                <div class="row mt-3">
                    