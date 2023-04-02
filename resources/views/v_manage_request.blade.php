@extends('humanresources.v_humanresource_nav')

@section('content')
<div class="container">
    <div class="col-lg-13">
        <div class="row">
            <div class="col-md-3">
                <div class="card btn btn-custom">
                    <div class="card-body">
                        <div class="text-center text-primary">ทั้งหมด</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card btn btn-custom">
                    <div class="card-body">
                        <div class="text-center text-warning">รออนุมัติ</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card btn btn-custom">
                    <div class="card-body">
                        <div class="text-center text-success">อนุมัติ</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card btn btn-custom">
                    <div class="card-body">
                        <div class="text-center text-danger">ไม่อนุมัติ</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-md-13">

                        {{-- ในส่วนของตาราง --}}
                        <table class="table table-bordered align-items-center">
                            <thead class="text-center text-light" id="bg">
                                <tr>
                                    <td scope="col" class="col-sm-1">วันที่</td>
                                    <td scope="col" class="col-sm-1">เลขที่</td>
                                    <td scope="col" class="col-sm-1">รูปแบบ</td>
                                    <td scope="col">ผู้เบิก</td>
                                    <td scope="col" class="col-md-3">ประเภทสวัสดิการ</td>
                                    <td scope="col" class="col-sm-2 ">จำนวนเงิน (บาท)</td>
                                    <td scope="col" class="col-sm-1">สถานะ</td>
                                    <td scope="col" class="col-sm-1">แสดงผล</td>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($requests as $index => $request)
                                    <tr>
                                        <td scope="col" class="col-sm-1 text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                                        <td scope="col" class="col-sm-1 text-center">{{ $request->id }}</td>
                                        <td scope="col" class="col-sm-1 text-center"></td>
                                        <td scope="col" class="">{{ $request->get_user->fname }}</td>
                                        <td scope="col" class="col-md-3">{{ $request->get_welfare->title }}</td>
                                        <td scope="col" class="col-sm-2 text-end">{{ $request->get_welfare->budget }}</td>
                                        <td scope="col" class="col-sm-1 text-center"></td>
                                        <td scope="col" class="col-sm-1 text-center"><a href="{{ url('/manage_request/'. $request->id) }}" class="btn btn-sm btn-primary"  style="font-size: 10px">แสดงรายการ</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $requests->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-5 ms-auto text-end">
                        {{ __('หมายเหตุ')  }}
                        &nbsp; {{ __(':')}}
                        &nbsp;
                        <img src="{{ URL::asset('img/approve.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('อนุมัติ') }}
                        &nbsp;
                        <img src="{{ URL::asset('img/cancel.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('ไม่อนุมัติ') }}
                        &nbsp;
                        <img src="{{ URL::asset('img/wait.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('รออนุมัติ') }}
                        &nbsp;
                        <img src="{{ URL::asset('img/cancel2.png') }}" width="25" height="25" alt="">
                        &nbsp;
                        {{ __('ยกเลิก') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
