@extends('humanresources.v_humanresource_nav')

@section('content')


<div class="container">
    <div class="col-lg-13">
        <div class="card">
            <div class=" mt-1 ms-4 fs-4 py-3 ">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}
                <hr width="308" class="mt-0"></div>
            <div class="card-body">
                <div class="row mt-1">
                    <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> อนุมัติ </option>
                                        <option value="1">รออนุมัติ</option>
                        </select>
                     </div>
                    <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                    <div class="col-md-2">
                        <select class="form-control form-select" name="welfare" id="welfare">
                                    <option selected="" disabled=""> บุคคล </option>
                                        <option value="1">บุคคล</option>
                                        <option value="2">สันทนาการ</option>
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
                    <div class="col-md-13">

                    {{-- ในส่วนของตาราง --}}
                        <table class="table table-bordered align-items-center" >
                            <thead class="text-center text-light " id="bg" >
                                <tr>
                                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">ประเภทสวัสดิการ</th>
                                    <th colspan="5" class="col-sm-1">ปี พ.ศ.</th>
                                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                                </tr>
                                <tr class="text-center text-light " id="bg">
                                    <td class="col-sm-1">2566</td>
                                    <td class="col-sm-1">2565</td>
                                    <td class="col-sm-1">2564</td>
                                    <td class="col-sm-1">2563</td>
                                    <td class="col-sm-1">2562</td></tr>
                            </thead>
                                <tbody>
                                    <style >
                                        tr:nth-child(even) {
                                        background-color: #EEEEEE;
                                        }
                                    </style >
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">รวิชญ์</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                        <td scope="col" class="text-end">2,000.00</td>
                                    </tr>

                                </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-13">
                        <table class="table table-bordered align-items-center">
                            <thead>
                                <tr>

                                    <th class="col-sm-2 ">ยอดรวม</td>
                                    <th class="col-sm-1 text-end">2,000.00</th>
                                    <th class="col-sm-1 text-end">2,000.00</th>
                                    <th class="col-sm-1 text-end">2,000.00</th>
                                    <th class="col-sm-1 text-end">2,000.00</th>
                                    <th class="col-sm-1 text-end">2,000.00</th>
                                    <th class="col-sm-2 text-end">2,000.00</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




                <div class="card qq ">
                    <div class="mt-1 ms-4 fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }} <hr width="308" class="mt-0"></div>
                    <div class="card-body ">
                        <div class="row mt-1">
                            <label for="budget" class="col-auto col-form-label ms-auto"> สถานะ : </label>
                            <div class="col-md-2">
                                <select class="form-control form-select" name="welfare" id="welfare">
                                            <option selected="" disabled=""> อนุมัติ </option>
                                                <option value="1">รออนุมัติ</option>
                                </select>
                            </div>
                            <label for="budget" class="col-auto col-form-label"> รูปแบบสวัสดิการ : </label>
                            <div class="col-md-2">
                                <select class="form-control form-select" name="welfare" id="welfare">
                                            <option selected="" disabled=""> บุคคล </option>
                                                <option value="1">บุคคล</option>
                                                <option value="2">สันทนาการ</option>
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
                        <div class="row mt-3 ff">
                            <div class="col ff">

                          <table class="table table-bordered align-items-center " >
                                <thead class="text-center text-light " id="bg" >
                                    <tr>
                                        <th rowspan="2" class="col-sm-2" valign="middle" align="center">ประเภทสวัสดิการ</th>
                                        <th colspan="12" class="col-sm-0">เดือน</th>
                                        <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                                    </tr>
                                    <tr class="text-center text-light " id="bg">
                                        <td class="col-sm-0">ม.ค.</td>
                                        <td class="col-sm-0">ก.พ.</td>
                                        <td class="col-sm-0">มี.ค.</td>
                                        <td class="col-sm-0">เม.ย.</td>
                                        <td class="col-sm-0">พ.ค.</td>
                                        <td class="col-sm-0">มิ.ย.</td>
                                        <td class="col-sm-0">ก.ค.</td>
                                        <td class="col-sm-0">ส.ค.</td>
                                        <td class="col-sm-0">ก.ย.</td>
                                        <td class="col-sm-0">ต.ค.</td>
                                        <td class="col-sm-0">พ.ย.</td>
                                        <td class="col-sm-0">ธ.ค.</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <style >
                                            tr:nth-child(even) {
                                            background-color: #EEEEEE;
                                            }
                                        </style >
                                        <tr>
                                            <td scope="col">รวิชญ์</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวิชญ์</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวิชญ์</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวิชญ์</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวิชญ์</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวิชญ์</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>
                                            <td scope="col" class="text-end">2,000.00</td>


                                </tbody>
                           </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-13">
                                <table class="table table-bordered align-items-center">
                                    <thead>
                                        <tr>

                                            <th class="col-sm-2 ">ยอดรวม</td>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-0 text-end">2,000.00</th>
                                            <th class="col-sm-2 text-end">2,000.00</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>
                    </div>


                </div>



@endsection
