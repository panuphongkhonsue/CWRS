<div class="col-md-13" >
    {{-- ในส่วนของตาราง --}}
    <table class="table table-bordered align-items-center">
        <thead class="text-center text-light" id="bg">
            <tr>
                <td scope="col" class="col-sm-1">วันที่</td>
                <td scope="col" class="col-sm-1">เลขที่</td>
                <td scope="col" class="col-sm-1">รูปแบบ</td>
                <td scope="col">ประเภทสวัสดิการ</td>
                <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                <td scope="col" class="col-sm-1 ">สถานะ</td>
                <td scope="col" class="col-sm-2">แสดงผล</td>
            </tr>
        </thead>
        <tbody class="">

            @foreach ($requests as $index => $request)
                <tr>
                    @switch($request->status)
                    @case(0)
                            @php ($icon = 'wait.png')
                                @break
                            @case(-2)
                                @php ($icon = 'cancel.png')
                                @break
                            @case(1)
                                @php ($icon = 'approve.png')
                                @break
                            @case(-1)
                                @php ($icon = 'cancel2.png')
                                @break
                        @endswitch
                        @switch($request->get_welfare->type)
                        @case('S')
                            @php ($text = 'บุคคล')
                            @break
                        @case('G')
                            @php ($text = 'สันทนาการ')
                            @break
                        @endswitch
                        @if ($walfare_year =='999')
                            <td class="text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                            <td class="text-center">{{ $request->id }}</td>
                            <td class="text-center">บุคคล</td>
                            <td>{{ $request->welfare_name }}</td>
                            <td class="text-end">{{ number_format($request->total_price, 2) }}</td>
                            <td class="text-center"><img src="{{ URL::asset('./img/'. $icon) }}" width="32" height="32"></td>
                            <td class="text-center"><a href="{{ route('show_history', ['id' => $request->id]) }}" class="btn btn-sm btn-primary">แสดงรายการ</a></td>
                        @elseif ($walfare_year == date("Y",strtotime($request->create_date)))
                            <td class="text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                            <td class="text-center">{{ $request->id }}</td>
                            <td class="text-center">บุคคล</td>
                            <td>{{ $request->welfare_name }}</td>
                            <td class="text-end">{{ number_format($request->total_price, 2) }}</td>
                            <td class="text-center"><img src="{{ URL::asset('./img/'. $icon) }}" width="32" height="32"></td>
                            <td class="text-center"><a href="{{ route('show_history', ['id' => $request->id]) }}" class="btn btn-sm btn-primary">แสดงรายการ</a></td>
                        @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $requests->links() !!}
</div>
