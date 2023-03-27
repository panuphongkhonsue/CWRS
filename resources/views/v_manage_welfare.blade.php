@extends('humanresources.v_humanresource_nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="card-header fs-4 py-3">{{ __('จัดการสวัสดิการ') }}</div>
                <div class="card-body">

                    <table class="table table-bordered align-items-center">
                        <thead class="text-center text-light" id="bg">
                            <tr>
                                <td scope="col" class="col-sm-2">รูปแบบสวัสดิการ</td>
                                <td scope="col">ประเภทสวัสดิการ</td>
                                <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                                <td scope="col" class="col-sm-2">ผู้เพิ่มสวัสดิการ</td>
                                <td scope="col" class="col-sm-1">แก้ไข</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($welfares as $welfare)
                                <tr>
                                    @switch($welfare->type)
                                        @case('S')
                                            @php ($text = "บุคคล")
                                            @break
                                        @case('G')
                                            @php ($text = "สันทนาการ")
                                            @break
                                    @endswitch
                                    <td scope="col" class="text-center">{{ $text }}</td>
                                    <td scope="col">{{ $welfare->title }}</td>
                                    <td scope="col" class="text-end">{{ $welfare->budget }}</td>
                                    <td scope="col" class="text-center">{{ $welfare->user->fname }}</td>
                                    <td scope="col" class="text-center"><button type="button" class="btn btn-sm btn-warning text-light" data-toggle="modal" data-target="#modal-in">แก้ไข</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="modal fade" id="modal-in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
