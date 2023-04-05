{{-- หน้าแสดงประวัติ หลังจากกด แสดงรายการ --}}

@extends('humanresources.v_humanresource_nav')

@section('content')
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


                        <div class="row">
                            <label for="id" class="col-sm-2 col-form-label fw-bold">{{ __('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->id }}" disabled>
                            </div>

                        </div>

                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label fw-bold">{{ __('ชื่อ-สกุล : ') }}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control border-0 bg-transparent " value="{{ $history->get_user->fname }} {{ $history->get_user->lname }}" disabled>
                            </div>
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
                                <input type="text" class="form-control bg-transparent border-dark" value="{{ $history->get_welfare->title }}" name="" id="" readonly       >
                            </div>

                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control border-0" value="{{ number_format($history->get_welfare->budget,2) }}" disabled>
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
                                        @php ($total = 0)
                                        @php ($price = json_decode($history->price))
                                        @foreach (json_decode($history->item) as $index => $item)
                                        @php ($total = $total + $price[$index])
                                            <tr>
                                                <td><input type="text" class="form-control border-0" value="{{ $item }}" readonly></td>
                                                <td><input type="text" class="form-control text-end border-0" value="{{ number_format($price[$index],2) }}" readonly></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
        
                        <div class="row mt-3">
                            <label for="total" class="col-auto col-form-label ms-auto">จำนวนเงินทั้งหมด : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control text-end border-0" style=" background-color: #eee;" value="{{ number_format($total,2) }}" readonly>
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
                                        <textarea name="message" style="width:400px; height:100px;" class="rounded text-start"></textarea>
                                        @else
                                        <textarea name="message" style="width:400px; height:100px;" class="rounded text-start" readonly></textarea>
                                        @endif  
                                    </div>

                                </div>
                        </div>
                        @if(($history->status) == 0)
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4 mt-5">
                                <a href="{{ url('reject/'. $history->id) }}" method="POST" class="btn btn-md btn-danger  me-md-4">ไม่อนุมัติ</a>
                                <a href="{{ url('approve/'. $history->id) }}" method="POST" class="btn btn-md btn-success">อนุมัติ</a>
                            </div>
                        @endif
                        </div>
                    </form>
                </div>

        </div>
    </div>
@endsection

