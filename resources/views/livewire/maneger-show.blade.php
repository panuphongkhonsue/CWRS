<div class="col-md-13">

                        <!-- //ในส่วนของตาราง -->
                        <table class="table table-bordered align-items-center">
                            <thead class="text-center text-light" id="bg">
                                <tr>
                                    <td scope="col" class="col-sm-1">วันที่</td>
                                    <td scope="col" class="col-sm-1">เลขที่</td>
                                    <td scope="col" class="col-sm-1">ผู้เบิก</td>
                                    <td scope="col">ประเภทสวัสดิการ</td>
                                    <td scope="col" class="col-sm-2">จำนวนเงิน (บาท)</td>
                                    <td scope="col" class="col-sm-1 ">สถานะ</td>
                                    <td scope="col" class="col-sm-2">แสดงผล</td>
                                </tr>
                                <!-- //กำหนดหัวข้อของตาราง -->
                            </thead>
                            <tbody class="">
         @foreach ($requests as $index => $request)
            <tr>
                @switch($request->status)
                    @case(2)
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
                        @if($manage_year =='999')
                            <td scope="col" class="col-sm-1 text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                            <td scope="col" class="col-sm-1 text-center">{{ $request->id }}</td>
                            <td scope="col" class="">{{ $request->get_user->fname }}</td>
                            <td scope="col" class="col-md-3">{{ $request->welfare_name }}</td>
                            <td scope="col" class="col-sm-2 text-end">{{ number_format($request->total_price, 2) }}</td>
                            <td scope="col" class="col-sm-1 text-center"><img src="{{ url('./img/'. $icon) }}" width="32" height="32"</td>
                            <td scope="col" class="col-sm-1 text-center"><a href="{{ url('./manage_request/'. $request->id) }}" class="btn btn-sm btn-primary"  style="font-size: 10px">แสดงรายการ</a>
                            </td>
                        @elseif($manage_year == date("Y",strtotime($request->create_date)))
                        <td scope="col" class="col-sm-1 text-center">{{ date("d/m/Y", strtotime($request->create_date)) }}</td>
                            <td scope="col" class="col-sm-1 text-center">{{ $request->id }}</td>
                            <td scope="col" class="">{{ $request->get_user->fname }}</td>
                            <td scope="col" class="col-md-3">{{ $request->welfare_name }}</td>
                            <td scope="col" class="col-sm-2 text-end">{{ number_format($request->total_price, 2) }}</td>
                            <td scope="col" class="col-sm-1 text-center"><img src="{{ url('./img/'. $icon) }}" width="32" height="32"</td>
                            <td scope="col" class="col-sm-1 text-center"><a href="{{ url('./manage_request/'. $request->id) }}" class="btn btn-sm btn-primary"  style="font-size: 10px">แสดงรายการ</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
                                <!-- //ข้อความที่จะแสดง -->
                        </table>
                    </div>
