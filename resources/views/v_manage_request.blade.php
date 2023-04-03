@extends('humanresources.v_humanresource_nav')

@section('content')
<div class="container">
    <div class="col-lg-13">

        <livewire:show-request-filter/>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-md-13">

                        {{-- ในส่วนของตาราง --}}
                        <livewire:show-requests/>
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
