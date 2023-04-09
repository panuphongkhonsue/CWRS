@extends('humanresources.v_humanresource_nav')

@section('content')
    <div class="row">
        <div class="col-lg-13">

            <livewire:request-filter />

            <div class="card mt-3">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-md-13">
                            <livewire:request-filter2>


                            {{-- ในส่วนของตาราง --}}
                            <livewire:request-show />

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-5 ms-auto text-end">
                            {{ __('หมายเหตุ') }}
                            &nbsp; {{ __(':') }}
                            &nbsp;
                            <img src="./img/approve.png" width="25" height="25" alt="">
                            &nbsp;
                            {{ __('อนุมัติ') }}
                            &nbsp;
                            <img src="./img/cancel.png" width="25" height="25" alt="">
                            &nbsp;
                            {{ __('ไม่อนุมัติ') }}
                            &nbsp;
                            <img src="./img/wait.png" width="25" height="25" alt="">
                            &nbsp;
                            {{ __('รออนุมัติ') }}
                            &nbsp;
                            <img src="./img/cancel2.png" width="25" height="25" alt="">
                            &nbsp;
                            {{ __('ยกเลิก') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection
