{{-- หน้าแสดงประวัติ หลังจากกด แสดงรายการ --}}

@extends('employees.v_employee_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="bold_header mx-5" style="line-height:20px">{{ __('เบิกสวัสดิการแบบบุคคล') }}
                    <hr width="295" class="mb-2"></div>

                <div class="card-body mx-5 px-5 mb-0 border-0 p-0">
                    <form method="POST" action="{{ route('create.single') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-2">
                            <div class="card px-4 py-3 pb-4 border-0" style=" background-color: #eee;">



                        <div class="row mt-2 ">
                            <label for="budget" class="col-auto col-form-label ms-auto fw-bold">{{ __('วัน/เดือน/ปี : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" id="date" name="date" class="form-control border-0 bg-transparent " value="{{ date("d/m/Y", strtotime($history->create_date)) }}" disabled>
                            </div>

                            <label for="req-id" class="col-auto col-form-label fw-bold">{{ __('เลขที่ใบเบิก : ') }}</label>
                                <div class="col-sm-2">
                                    <input type="text" name="req-id" id="req-id" class="form-control border-0 bg-transparent " value="{{ $history->id }}" disabled>
                                </div>
                            </label>

                        </div>

                        <div class="row mt-4">
                            <label for="id" class="col-sm-2 col-form-label fw-bold">{{ __('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->id }}" disabled>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <label for="name" class="col-sm-2 col-form-label fw-bold">{{ __('ชื่อ-สกุล : ') }}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->fname }} {{ $history->get_user->lname }}" disabled>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label for="department" class="col-sm-2 col-form-label fw-bold">{{ __('แผนก : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->department->name }}" disabled>
                            </div>
                        </div>
                        </div>

                        <div class="row mt-5">
                            <label for="welfare" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control bg-transparent " value="{{ $history->get_welfare->title }}" name="" id="" readonly       >
                            </div>

                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control border-0" value="{{ __('2,000.00') }}" disabled>
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
                                <table id="detail" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" class="col-lg-8">รายละเอียด</th>
                                            <th scope="col" class="">จำนวนเงิน (บาท)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php ($price = json_decode($history->price))
                                        @foreach (json_decode($history->item) as $index => $item)
                                            <tr>
                                                <td><input type="text" class="form-control" value="{{ $item }}" readonly></td>
                                                <td><input type="text" class="form-control text-end" value="{{ $price[$index] }}" readonly></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control text-end border-0" style=" background-color: #eee;" value="{{ __('0') }}" readonly>
                            </div>
                            <label for="" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-3">
                            <label for="bill" class="col-auto col-form-label">ไฟล์ใบเสร็จ : </label>
                                <div class="col-sm-5">
                                    @foreach (json_decode($history->bill) as $bill)
                                        <div class="row mt-3">
                                            <a href="" for="" class="col-auto col-form-label">{{ $bill }}</a>
                                        </div>
                                    @endforeach
                                </div>
                        </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                                <a href="{{ url('reject/'. $history->id) }}" method="POST" class="btn btn-md btn-danger  me-md-4">ไม่อนุมัติ</a>
                                <a href="{{ url('approve/'. $history->id) }}" method="POST" class="btn btn-md btn-success">อนุมัติ</a>
                            </div>
                        </div>
                    </form>
                </div>

        </div>
    </div>
</div>
@endsection
