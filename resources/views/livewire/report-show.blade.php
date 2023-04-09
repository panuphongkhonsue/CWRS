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
            <?php
            // echo $year1[0]->id
            // echo $welfares
             ?>
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
                                {{-- @if (isset($year1[$index]->sum)) --}}

                                    @foreach ($year1 as $yearIndex=>$year)
                                        @if ($welfares[$index]->id == $year1[$yearIndex]->id)
                                        <?php $sum += $year1[$yearIndex]->sum ?>
                                        <td class="text-end">{{ $year1[$yearIndex]->sum }}</td>
                                        @break
                                        @endif
                                        @if ($yearIndex + 1 == COUNT($year1))
                                        <td class="text-end">0</td>
                                        @endif
                                    @endforeach

                                    {{-- <td class="text-end">{{ $year1[$index]->sum }}</td>
                                    @php ($sum += $year1[$index]->sum) --}}
                                {{-- @else --}}
                                    {{-- <td class="text-end">0</td> --}}
                                {{-- @endif --}}
                                @if (COUNT($year2) == 0)
                                    <td class="text-end">0</td>
                                    @endif
                                @foreach ($year2 as $yearIndex=>$year)
                                        @if ($welfares[$index]->id == $year2[$yearIndex]->id)
                                        <?php $sum += $year2[$yearIndex]->sum ?>
                                        <td class="text-end">{{ $year2[$yearIndex]->sum }}</td>
                                        @break
                                        @endif
                                        @if ($yearIndex + 1 == COUNT($year2))
                                        <td class="text-end">0</td>
                                        @endif
                                    @endforeach


                                {{-- @if (isset($year2[$index]->sum))
                                    <td class="text-end">{{ $year2[$index]->sum }}</td>
                                    @php ($sum += $year2[$index]->sum)
                                @else
                                    <td class="text-end">0</td>
                                @endif --}}
                                @if (COUNT($year3) == 0)
                                <td class="text-end">0</td>
                                @endif
                                @foreach ($year3 as $yearIndex=>$year)
                                        @if ($welfares[$index]->id == $year3[$yearIndex]->id)
                                        <?php $sum += $year3[$yearIndex]->sum ?>
                                        <td class="text-end">{{ $year3[$yearIndex]->sum }}</td>
                                        @break
                                        @endif
                                        @if ($yearIndex + 1 == COUNT($year3))
                                        <td class="text-end">0</td>
                                        @endif
                                    @endforeach
                                    @if (COUNT($year4) == 0)
                                    <td class="text-end">0</td>
                                    @endif
                                @foreach ($year4 as $yearIndex=>$year)
                                    @if ($welfares[$index]->id == $year4[$yearIndex]->id)
                                    <?php $sum += $year4[$yearIndex]->sum ?>
                                    <td class="text-end">{{ $year4[$yearIndex]->sum }}</td>
                                    @break
                                    @endif
                                    @if ($yearIndex + 1 == COUNT($year4))
                                    <td class="text-end">0</td>
                                    @endif
                                @endforeach

                                @if (COUNT($year5) == 0)
                                    <td class="text-end">0</td>
                                    @endif
                                @foreach ($year5 as $yearIndex=>$year)
                                    @if ($welfares[$index]->id == $year5[$yearIndex]->id)
                                    <?php $sum += $year5[$yearIndex]->sum ?>
                                    <td class="text-end">{{ $year5[$yearIndex]->sum }}</td>
                                    @break
                                    @endif
                                    @if ($yearIndex + 1 == COUNT($year5))
                                    <td class="text-end">0</td>
                                    @endif
                                @endforeach
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
                    @foreach ($welfares as $index => $welfare)
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
                            @for ($i = 0; $i < 12; $i++)
                                <td class="text-end">
                                    @foreach ($month as $monthIndex=>$month)
                                        @if ($welfares[$index]->id == $month[$i][$monthIndex]->id)
                                        <td class="text-end">{{ $month[$i][$momthIndex]->sum }}</td>
                                        @break
                                        @endif
                                        @if ($monthIndex + 1 == COUNT($month[$i]))
                                        <td class="text-end">0</td>
                                        @endif
                                    @endforeach
                                </td>
                            @endfor
                            <td class="text-end">{{ $sum }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
