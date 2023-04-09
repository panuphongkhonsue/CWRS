<div>
    @if ($tb == 1)

        {{-- ในส่วนของตาราง --}}

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
                                @if (isset($year1[$index]))
                                    <td class="text-end">{{ $year1[$index]->sum }}</td>
                                    @php ($sum += $year1[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif

                                @if (isset($year2[$index]))
                                    <td class="text-end">{{ $year2[$index]->sum }}</td>
                                    @php ($sum += $year2[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif

                                @if (isset($year3[$index]))
                                    <td class="text-end">{{ $year3[$index]->sum }}</td>
                                    @php ($sum += $year3[$index]->sum)
                                @else
                                     <td class="text-end">0</td>
                                @endif

                                @if (isset($year4[$index]))
                                    <td class="text-end">{{ $year4[$index]->sum }}</td>
                                    @php ($sum += $year4[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif
                                @if (isset($year5[$index]))
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
</div>
