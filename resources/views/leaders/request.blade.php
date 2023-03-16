@extends('leaders.headnav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-13">
            <div class="card">
                <div class="card-header fs-4 py-3">{{ __('เบิกสวัสดิการแบบรายบุคคล') }}</div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="row mt-2">
                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('วัน/เดือน/ปี : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" name="date" class="form-control" value="{{ date("d/m/Y") }}" readonly>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label for="id" class="col-sm-2 col-form-label">{{ __('รหัสพนักงาน : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="{{ Auth::user()->id }}" disabled>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('ชื่อ-สกุล : ') }}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" disabled>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label for="department" class="col-sm-2 col-form-label">{{ __('แผนก : ') }}</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="{{ Auth::user()->department->name }}" disabled>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="category" class="col-auto col-form-label">{{ __('ประเภทสวัสดิการ : ') }}</label>
                            <div class="col-md-5">
                                <select class="form-control" name="category" id="category">
                                    <option selected disabled>เลือกประเภทสวัสดิการ</option>
                                    @foreach ($welfares as $welfare)
                                        <option>{{ $welfare->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="budget" class="col-auto col-form-label ms-auto">{{ __('จำนวนเงินที่เบิกได้ : ') }}</label>
                            <div class="col-sm-2">
                                <input type="text" class="text-end form-control" value="{{ __('2,000.00') }}" disabled>
                            </div>

                            <label for="id" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-5 fs-5">
                            <div class="col-md-4">
                                รายละเอียดการขอเบิกสวัสดิการ
                                <hr>
                            </div>
                            </div>

                        <div class="row mt-3 d-flex justify-content-center">
                            <div class="col-lg-11">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" class="col-lg-8">รายละเอียด</th>
                                            <th scope="col" class="">จำนวนเงิน (บาท)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control text-end"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="total" class="col-auto col-form-label">จำนวนเงินทั้งหมด : </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control text-end" value="{{ __('0') }}" readonly>
                            </div>
                            <label for="" class="col-auto col-form-label">{{ __('บาท') }}</label>
                        </div>

                        <div class="row mt-3">
                            <label for="upload" class="col-auto col-form-label">อัปโหลดใบเสร็จ : </label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control file" value="อัปโหลดไฟล์" multiple>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-2 ms-auto">
                                <button class="btn btn-lg btn-success">ส่งคำขอ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
