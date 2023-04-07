@extends('humanresources.v_humanresource_nav')

@section('content')


<div class="container">
    <div class="col-lg-20">
        <div class="card">
            <div class="card-header fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}</div>
                <div class="card-body">
                    <livewire:report-filter/>
                    <br>
                    <livewire:report-show/>
                </div>
            </div>
        </div>
    </div>
</div>

            
@endsection
