<center><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
                <canvas id="myChart" style="width:300%;max-width:800px"></canvas></center>
<div class="row mt-3">
                    <!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
                    <div class="col-md-13">

                        <!-- //ในส่วนของตาราง -->
                        <table class="table table-bordered align-items-center" >
                            <!-- //กำหนดขนาดและสีของตาราง -->
                            <thead class="text-center text-light " id="bg" >
                                <tr>
                                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">ประเภทสวัสดิการ</th>
                                    <th colspan="5" class="col-sm-1">ปี พ.ศ.</th>
                                    <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                                </tr>
                                <!-- //การแยก col และ row ในส่วนของตาราง -->
                                <tr class="text-center text-light " id="bg">
                                    <td class="col-sm-1">2566</td>
                                    <td class="col-sm-1">2565</td>
                                    <td class="col-sm-1">2564</td>
                                    <td class="col-sm-1">2563</td>
                                    <td class="col-sm-1">2562</td></tr>
                            </thead>
                            <!-- //กำหนดหัวข้อของตาราง -->
                                <tbody>
                                    <style >
                                        tr:nth-child(even) {
                                        background-color: #DCDCDC;
                                        }
                                    </style >
                                     <!-- //สร้างตารางและกำหนดสีของตาราง -->
                                     @foreach ($requests as $index => $request)
                                    <tr>
                                                @switch($request->get_welfare->type)
                                                    @case('S')
                                                        @php ($text = 'บุคคล')
                                                        @break
                                                    @case('G')
                                                        @php ($text = 'สันทนาการ')
                                                        @break
                                                @endswitch
                                                <td scope="col" class="col-sm-1 text-center">{{ $request->get_welfare->title }}</td>
                                                <td scope="col" class="col-sm-1 text-center">{{ $request->id }}</td>
                                                <td scope="col" class="col-sm-1 text-center">{{ $text }}</td>
                                                <td scope="col" class="">{{ $request->get_user->fname }}</td>
                                                <td scope="col" class="col-md-3">{{ $request->get_welfare->title }}</td>
                                                <td scope="col" class="col-sm-2 text-end">{{ $request->get_welfare->budget }}</td>
                                                <td scope="col" class="col-sm-1 text-center"><img src="{{ URL::asset('/img/'. $icon) }}" width="32" height="32"></td>
                                                <td scope="col" class="col-sm-1 text-center"><a href="{{ url('/manage_request/'. $request->id) }}" class="btn btn-sm btn-primary"  style="font-size: 10px">แสดงรายการ</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $requests->links() !!}
                                 <!-- //ข้อความที่จะแสดง -->
                        </table>
                    </div>
                </div>
                <div class="row mt-4"></div>
                <div class="col-md-13"></div>
                    <!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
            


<center><script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<canvas id="myChart02" style="width:500%;max-width:1000px"></canvas></center>
<div class="row mt-3">
<!-- //กำหนดการเว้นระยะห่างจากส่วนข้างบน -->
<div class="col-md-13">
<!-- //ในส่วนของตาราง -->
                            <table class="table table-bordered align-items-center" >
                                <thead class="text-center text-light " id="bg" >
                                    <tr>
                                        <th rowspan="2" class="col-sm-1" valign="middle" align="center">ประเภทสวัสดิการ</th>
                                        <th colspan="12" class="col-sm-1">เดือน</th>
                                        <th rowspan="2" class="col-sm-2" valign="middle" align="center">จำนวนเงิน (บาท)</th>
                                    </tr>
                                    <!-- //การแยก col และ row ในส่วนของตาราง -->
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
                                <!-- //กำหนดหัวข้อของตาราง -->
                                <table class="table table-striped">
                                    <!-- //สร้างตารางและกำหนดสีของตาราง -->
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"></td>
                                    </tr>
                                </table>
                                <!-- //ข้อความที่จะแสดง -->
                        </table>
                            </div>
                        </div>
                        