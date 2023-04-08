{{-- ในส่วนของตาราง --}}
@if($report_year =='999')
<table class="table table-bordered align-items-center" >
    <thead class="text-center text-light " id="bg" >
        <tr>
            <th rowspan="2" class="col-sm-2" valign="middle" align="center">ประเภทสวัสดิการ</th>
            <th colspan="5" class="col-sm-1">ปี พ.ศ.</th>
            <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
        </tr>
        <tr class="text-center text-light " id="bg">
            <td class="col-sm-1">2566</td>
            <td class="col-sm-1">2565</td>
            <td class="col-sm-1">2564</td>
            <td class="col-sm-1">2563</td>
            <td class="col-sm-1">2562</td></tr>
        </thead>
    <tbody>
        <style >
            tr:nth-child(even) {
            background-color: #DCDCDC;
            }
        </style >
        <!-- @foreach ($requests as $index => $request)
            
                <tr>
                    @php ($total = number_format(array_sum(json_decode($request->price)), 2))
                        
                        @switch($request->get_welfare->type)
                        @case('S')
                            @php ($text = 'บุคคล')
                            @break
                        @case('G')
                            @php ($text = 'สันทนาการ')
                            @break
                        @endswitch
                        @if($report_year =='999')
                            <td class="text-center">{{ $request->get_welfare->title }}</td>
                            <td class="text-center">{{ $total_year }}</td>
                            <td class="text-center">บุคคล</td>
                            <td></td>
                            <td class="text-end">{{ $total }}</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        @elseif($report_year==date("Y",strtotime($request->create_date)))
                            <td class="text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                            <td class="text-center">{{ $request->id }}</td>
                            <td class="text-center">บุคคล</td>
                            <td>{{ $request->get_welfare->title }}</td>
                            <td class="text-end">{{ $total }}</td>
                            <td class="text-center"><img src="{{ URL::asset('/img/'. $icon) }}" width="32" height="32"></td>
                            <td class="text-center"><a href="{{ route('show_history', ['id' => $request->id]) }}" class="btn btn-sm btn-primary">แสดงรายการ</a></td>
                @endif
            
            </tr>
            @endforeach -->
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
                    <td scope="col" class="title">{{ $welfare->title }}</td>
                    <td scope="col" class="text-end budget">{{ $welfare->budget }}</td>
                    <td scope="col" class="text-center">{{ $welfare->user->fname }}</td>
                    <td scope="col" class="text-center"><button type="button" class="show_data btn btn-sm btn-warning text-light" data-bs-toggle="modal" data-bs-target="#modal-in">แก้ไข</button></td>
                    <td class="d-none">{{ $welfare->id }}</td>
                </tr>
            @endforeach
    </tbody>
 </table>

@else
<div class="row mt-3">
    <div class="col-md-13">
        <table class="table table-bordered align-items-center" >
            <thead class="text-center text-light " id="bg" >
                <tr>
                    <th rowspan="2" class="col-sm-1" valign="middle" align="center">ประเภทสวัสดิการ</th>
                    <th colspan="12" class="col-sm-1">เดือน</th>
                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                </tr>
                <tr class="text-center text-light " id="bg">
                    <td class="col-sm-1">ม.ค.</td>
                    <td class="col-sm-1">ก.พ.</td>
                    <td class="col-sm-1">มี.ค.</td>
                    <td class="col-sm-1">เม.ย.</td>
                    <td class="col-sm-1">พ.ค.</td>
                    <td class="col-sm-1">มิ.ย.</td>
                    <td class="col-sm-1">ก.ค.</td>
                    <td class="col-sm-1">ส.ค.</td>
                    <td class="col-sm-1">ก.ย.</td>
                    <td class="col-sm-1">ต.ค.</td>
                    <td class="col-sm-1">พ.ย.</td>
                    <td class="col-sm-1">ธ.ค.</td>                    
                </tr>
            </thead>
        </table>
    </div>
</div>
@endif