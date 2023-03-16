@extends('humanresources.hrnav')

@section('content')
<div class="container">
    <div class="col-lg-13">
        <div class="card">
            <div class="card-header fs-4">{{ __('ประวัติการเบิกสวัสดิการ') }}</div>
            <div class="card-body">
                <div class="row mt-3">

                </div>
                <div class="row mt-4">
                    <div class="col-md-11">
                        <table class="table table-bordered mx-3 align-items-center">
                            <thead class="text-center text-light" id="bg">
                                <tr>
                                    <td scope="col" class="col-sm-1">วันที่</td>
                                    <td scope="col" class="col-sm-1">เลขที่</td>
                                    <td scope="col">ประเภทสวัสดิการ</td>
                                    <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                                    <td scope="col" class="col-sm-1 ">สถานะ</td>
                                    <td scope="col" class="col-sm-2">แสดงผล</td>
                                </tr>
                            </thead>
                            <tbody class="">
                                <tr>
                                    <td class="text-center">2566/02/22</td>
                                    <td class="text-center">P-0011</td>
                                    <td>เงินช่วยเหลืองานสมรส</td>
                                    <td class="text-end">3,000.00</td>
                                    <td class="text-center"><img src="{{ URL::asset('/img/wait.png') }}" width="32" height="32"></td>
                                    <td class="text-center"><button class="btn btn-primary btn-sm">แสดงรายการ</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
