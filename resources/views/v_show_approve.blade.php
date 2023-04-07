{{-- หน้าแสดงประวัติ หลังจากกด แสดงรายการ --}}

@extends('humanresources.v_humanresource_nav')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="bold_header mx-5" style="line-height:20px">{{ __('เบิกสวัสดิการแบบบุคคล') }}
                    <hr width="295" class="mb-2"></div>

                <div class="card-body mx-5 px-5 mb-0 border-0 p-0">
                    <form id="confirm-req" method="POST" action="{{ route('confirm', ['id' => $history->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mt-2">
                            <div class="card px-4 py-3 pb-4 border-0" style=" background-color: #eee;">


                        <div class="d-flex justify-content-end">
                            <div class="row text-right mt-2">
                                <label for="budget" class="col-auto col-form-label ms-auto fw-bold ">{{ __('วัน/เดือน/ปี : ') }}</label>
                                <div class="col-sm-3 ">
                                    <input type="text" id="date" name="date" class="form-control border-0 bg-transparent " value="{{ date("d/m/Y", strtotime($history->create_date)) }}" disabled>
                                </div>

                                <label for="req-id" class="col-auto col-form-label fw-bold">{{ __('เลขที่ใบเบิก : ') }}</label>
                                    <div class="col-sm-2 ">
                                        <input type="text" name="req-id" id="req-id" class="form-control border-0 bg-transparent top-0 end-0" value="{{ $history->id }}" disabled>
                                    </div>
                                </label>

                            </div>
                        </div>

                        <!-- แสดงสถานะ -1 คือ วันที่ถูกยกเลิก -->
                                <!-- แสดงสถานะ 1 คือ วันที่ถูกอนุมัติ -->
                                <!-- แสดงสถานะ -1 คือ วันที่ไม่ถูกอนุมัติ -->
                                @if ($history->status == -1)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('วันที่ถูกยกเลิก') }}</small>
                                    </div>
                                </div>

                                @elseif($history->status == 1)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('วันที่ถูกอนุมัติ') }}</small>
                                    </div>
                                </div>

                                @elseif($history->status == -2)
                                <div class="row">
                                    <div class="col-7">

                                    </div>
                                    <div class="col">
                                        <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('วันที่ไม่ถูกอนุมัติ') }}</small>
                                    </div>
                                </div>
                                @endif

                        <div class="row">
                            <label for="id" class="col-sm-2 col-form-label fw-bold">{{ __('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->id }}" disabled>
                            </div>
                                @if($history->status == 1)
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group position-absolute top-0 end-0">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/tt11.png') }}" class="img-rounded" alt="" width="26" height="26"></span>
                                            </div>
                                                <div class="col-xs-2">
                                                    <input value="{{ date("d/m/Y", strtotime($history->hr_approve_date)) }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                                </div>
                                        </div>
                                    </div>

                                    <!-- แสดงรูปแล้วกรอบรูปของสถานะ -1 คือ ไม่ถูกอนุมัติ -->
                                    @elseif($history->status <= -1)
                                    <div class="col-sm form-group position-relative">
                                        <div class="input-group position-absolute top-0 end-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/bg.png') }}" class="img-rounded" alt="" width="26" height="26"</span>
                                            </div>
                                            <div class="col-xs-2">
                                                <input value="{{ date("d/m/Y", strtotime($history->hr_approve_date)) }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- แสดงรูปแล้วกรอบรูปของสถานะ คือ เมื่อผู้ใช้ยกเลิก -->
                                    @else
                                    <div class="col-sm form-group">
                                        <div class="input-group mx-5">

                                        </div>
                                    </div>
                                    @endif
                        </div>

                        <!-- แสดงก็ต่อเมื่อสถานะ 1 คือ ผ่านการอนุมัติโดย -->
                        @if($history->status == 1)
                        <div class="row">
                            <div class="col-7">

                            </div>
                            <div class="col">
                                <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('ผ่านการอนุมัติโดย') }}</small>
                            </div>
                        </div>

                        <!-- แสดงก็ต่อเมื่อสถานะ -2 คือ ไม่ผ่านการอนุมัติโดย -->
                        @elseif($history->status == -2)
                        <div class="row">
                            <div class="col-7">

                            </div>
                            <div class="col">
                                <small id="formGroupExampleInput" class="form-text text-muted ">{{ __('ไม่ผ่านการอนุมัติโดย') }}</small>
                            </div>
                        </div>

                        <!-- แสดงก็ต่อเมื่อผู้ใช้ยกเลิกการเบิก-->
                        @else
                        <div class="row">
                            <div class="col-7">

                            </div>
                            <div class="col">

                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label fw-bold">{{ __('ชื่อ-สกุล : ') }}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->fname }} {{ $history->get_user->lname }}" disabled>
                            </div>

                            <!-- แสดงก็ต่อเมื่อสถานะ 1 คือ ผ่านการอนุมัติโดย -->
                            @if($history->status == 1)
                            <div class="col-sm form-group position-relative">
                                <div class="input-group  position-absolute top-0 end-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/tt22.png') }}" class="img-rounded" alt="" width="26" height="26"</span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input value="{{ $history->get_approver->fname }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                    </div>
                                </div>
                            </div>

                            <!-- แสดงก็ต่อเมื่อสถานะ -2 คือ ไม่ผ่านการอนุมัติโดย -->
                            @elseif($history->status == -2)
                            <div class="col-sm form-group position-relative">
                                <div class="input-group  position-absolute top-0 end-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text-sm mx-2" id="basic-addon1"><img src="{{ URL::asset('img/tt33.png') }}" class="img-rounded" alt="" width="26" height="26"</span>
                                    </div>
                                    <div class="col-xs-2">
                                        <input value="{{ $history->get_approver->fname }}" class="form-control form-control-sm" type="text" aria-label=".form-control-sm example" style=" background-color: #D9D9D9;">
                                    </div>
                                </div>
                            </div>

                            <!-- แสดงก็ต่อเมื่อผู้ใช้ยกเลิกการเบิก-->
                            @else
                            <div class="col-sm form-group position-relative">
                                <div class="input-group  position-absolute top-0 end-0">

                                </div>
                            </div>
                            @endif

                        </div>

                        <div class="row">
                            <label for="department" class="col-sm-2 col-form-label fw-bold">{{ __('แผนก : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->department->name }}" disabled>
                            </div>
                        </div>
                        </div>

                        <div class="row mt-5">
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control bg-transparent border-dark" value="{{ $history->welfare_name }}" name="" id="" readonly       >
                            </div>

                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control border-0" value="{{ number_format($history->welfare_budget, 2) }}" disabled>
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-5 fs-5">
                            <div class="col-md-4">
                                รายละเอียดการขอเบิกสวัสดิการ
                                <hr width="255" class="my-0">
                            </div>
                            </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-lg-11">
                                <table id="detail" class="table table-bordered border-dark" style="left: 20px">
                                    <thead id="bg" class="text-white">
                                        <tr class="text-center">
                                            <th scope="col" class="col-lg-8">รายละเอียด</th>
                                            <th scope="col" class="">จำนวนเงิน (บาท)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php ($price = json_decode($history->price))
                                        @foreach (json_decode($history->item) as $index => $item)
                                            <tr>
                                                <td><input type="text" class="form-control border-0" value="{{ $item }}" readonly></td>
                                                <td><input type="text" class="form-control text-end border-0" value="{{ $price[$index] }}" readonly></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control text-end border-0" style=" background-color: #eee;" value="{{ number_format($history->total_price, 2) }}" readonly>
                            </div>
                            <label for="" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-4">

                            <div class="col-md-6">
                                <label for="bill">ไฟล์ใบเสร็จ : </label>
                                    <div class="card-text px-4 rounded me-3" style="background-color: #eee">
                                        @foreach (json_decode($history->bill) as $bill)
                                            <div class="row">
                                                <a href="{{ URL::asset('/bills/'. $bill) }}" for="" class="col-auto col-form-label" target="blank">{{ $bill }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6 text-end">
                                    <label class="">หมายเหตุ : </label>
                                    <div class="">
                                        @if(($history->status) == 0)
                                            <textarea name="note" style="width:400px; height:100px;" class="rounded text-start">{{ $history->note }}</textarea>
                                        @else
                                            <textarea name="note" style="width:400px; height:100px;" class="rounded text-start" readonly>{{ $history->note }}</textarea>
                                        @endif
                                    </div>
                                </div>
                        </div>

                        @if(($history->status) == 0)
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4 mt-5">
                                <button type="button" name="" id="rej" value="reject" class="btn btn-md btn-danger me-md-4 confirm">ไม่อนุมัติ</button>
                                <button type="button" name="" id="acc" value="accept" class="btn btn-md btn-success confirm">อนุมัติ</button>
                            </div>
                        @endif

                        <input type="text" name="dec" id="dec" hidden>

                        </div>
                    </form>
                </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $("#acc").click(function() {
            var des = document.getElementById("dec");
            des.value = "accept";

            Swal.fire({
                title: 'คุณแน่ใจหรือไม่ ?',
                text: 'คุณต้องการอนุมัติคำขอเบิกสวัสดิการนี้หรือไม่',
                imageUrl: '{{ URL('./img/alert1.png') }} ',
                imageWidth: 150,
                imageHeight: 150,
                denyButtonText: 'ยกเลิก',
                confirmButtonText: 'ยืนยัน',
                confirmButtonColor: '#32cd32',
                denyButtonColor: '#ff0000',
                showDenyButton: true,
                showCloseButton: true,
                reverseButtons: true,
                customClass: {
                    confirmButton: 'confirm-button-class',
                    denyButton: 'deny-button-class'
                },
                preConfirm: () => {
                    document.getElementById("confirm-req").submit();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        imageUrl: '{{ URL('./img/correct1.png') }} ',
                        title: 'สำเร็จ',
                        text: 'อนุมัติคำขอเบิกสวัสดิการสำเร็จ',
                        showConfirmButton: false,
                        imageWidth: 150,
                        imageHeight: 150,
                        timer: 1500,
                    })
                } else if (result.isDenied) {
                    Swal.fire({
                        imageUrl: '{{ URL('./img/cancelreq.png') }} ',
                        title: 'ไม่สำเร็จ',
                        showConfirmButton: false,
                        text: 'ยกเลิกการอนุมัติคำขอ',
                        imageWidth: 150,
                        imageHeight: 150,
                        timer: 1500
                    })
                }
            })
        })

        $("#rej").click(function() {
            var des = document.getElementById("dec");
            des.value = "reject";
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่ ?',
                text: 'คุณต้องการอนุมัติคำขอเบิกสวัสดิการนี้หรือไม่',
                imageUrl: '{{ URL('./img/alert1.png') }} ',
                imageWidth: 150,
                imageHeight: 150,
                denyButtonText: 'ยกเลิก',
                confirmButtonText: 'ยืนยัน',
                confirmButtonColor: '#32cd32',
                denyButtonColor: '#ff0000',
                showDenyButton: true,
                showCloseButton: true,
                reverseButtons: true,
                customClass: {
                    confirmButton: 'confirm-button-class',
                    denyButton: 'deny-button-class'
                },
                preConfirm: () => {
                    document.getElementById("confirm-req").submit();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        imageUrl: '{{ URL('./img/correct1.png') }} ',
                        title: 'สำเร็จ',
                        text: 'ปฏิเสธคำขอเบิกสวัสดิการสำเร็จ',
                        showConfirmButton: false,
                        imageWidth: 150,
                        imageHeight: 150,
                        timer: 1500
                    })
                } else if (result.isDenied) {
                    Swal.fire({
                        imageUrl: '{{ URL('./img/cancelreq.png') }} ',
                        title: 'ไม่สำเร็จ',
                        showConfirmButton: false,
                        text: 'ยกเลิกการปฏิเสธคำขอ',
                        imageWidth: 150,
                        imageHeight: 150,
                        timer: 1500
                    })
                }
            })
        })
    })
</script>
@endsection

