<div>
    @if ($tb == 1)

        {{-- ในส่วนของตาราง --}}

    <table class="table table-bordered align-items-center table-striped" >
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
            @php
            function check($array, $key)
            {
                if (isset($array[$key])) {
                    if (is_null($array[$key])) {
                        return false;
                    }
                    return true;
                }
            }
            @endphp
            
            @foreach ($welfares as $index => $welfare)
                    <tr>

                            @switch($welfare->type)
                            @case('S')
                                @php ($text = 'บุคคล')
                                @break
                            @case('G')
                                @php ($text = 'สันทนาการ')
                                @break
                            @endswitch


                                <td class="text-center">{{ $welfare->title }}</td>
                                @php ($sum = 0)
                                @if (isset($year1[$index]->sum))
                                    <td class="text-end">{{ $year1[$index]->sum }}</td>
                                    @php ($sum += $year1[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif

                                @if (isset($year2[$index]->sum))
                                    <td class="text-end">{{ $year2[$index]->sum }}</td>
                                    @php ($sum += $year2[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif

                                @if (isset($year3[$index]->sum))
                                    <td class="text-end">{{ $year3[$index]->sum }}</td>
                                    @php ($sum += $year3[$index]->sum)
                                @else
                                     <td class="text-end">0</td>
                                @endif

                                @if (isset($year4[$index]->sum))
                                    <td class="text-end">{{ $year4[$index]->sum }}</td>
                                    @php ($sum += $year4[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif
                                @if (isset($year5[$index]->sum))
                                    <td class="text-end">{{ $year5[$index]->sum }}</td>
                                    @php ($sum += $year5[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif
                                <td class="text-end">{{ $sum }}</td>

                    </tr>
                @endforeach
        </tbody>
     </table>
     @endif
    @if ($tb == 2)
    <div class="row mt-3">
        <div class="col-md-13">
            <table class="table table-bordered align-items-center table-striped" >
                <thead class="text-center text-light " id="bg" >
                    <tr>
                        <th rowspan="2" class="col-sm-1" valign="middle" align="center">ประเภทสวัสดิการ</th>
                        <th colspan="12" class="col-sm-1">เดือน</th>
                        <th rowspan="2" class="col-sm-1" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                    </tr>
                    <tr class="text-center text-light " id="bg">
                        <td class="col-auto">ม.ค.</td>
                        <td class="col-auto">ก.พ.</td>
                        <td class="col-auto">มี.ค.</td>
                        <td class="col-auto">เม.ย.</td>
                        <td class="col-auto">พ.ค.</td>
                        <td class="col-auto">มิ.ย.</td>
                        <td class="col-auto">ก.ค.</td>
                        <td class="col-auto">ส.ค.</td>
                        <td class="col-auto">ก.ย.</td>
                        <td class="col-auto">ต.ค.</td>
                        <td class="col-auto">พ.ย.</td>
                        <td class="col-auto">ธ.ค.</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($welfares as $welfare)
                        @php ($sum = 0)
                        <tr>
                            @switch($welfare->type)
                            @case('S')
                                @php ($text = 'บุคคล')
                                @break
                            @case('G')
                                @php ($text = 'สันทนาการ')
                                @break
                            @endswitch
                            <td class="text-center">{{ $welfare->title }}</td>

                            <td class="text-end">{{ $sum }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
