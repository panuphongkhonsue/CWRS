{{-- หน้าข้อมูลคำร้อง --}}

<!-- 
/*
* v_report.blade.php
* แสดงประวัติของการเบิกในจำนวนเงินทั้งหมด
* @input : กดแถบข้างเพื่อเข้าหน้ารายงานสรุปการเบิก
* @output : แสดงข้อมูลประวัติย้อนหลัง 5 ปี และแสดงข้อมูลประวัติแต่ละปี
* @author : ชษิตา โตชาวนา 64160064 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-05
*/ -->

@extends('humanresources.v_humanresource_nav')

@section('content')


<div class="container">
    <!-- //ตัวแปรตั้งค่าโครง -->
    <div class="col-lg-20">
        <!-- //กำหนดบรรทัด col ของหน้าจอ -->
        <div class="card">
            <div class="card-header fs-4 py-3">{{ __('รายงานเบิกสวัสดิการส่วนบุคคล') }}</div>
            <!-- //กำหนดขนาดของหัวข้อ และสร้างคำหัวข้อ -->

            <livewire:report-filter/>


        <div class="row align-items-center">
        <div class="col-text-end margitext mt-3 col-sm-2">
          <div class="card text-white bg-info mb-3" style="max-width: 15rem;">
            <div class="card-header">
              <ion-icon name="people-outline"></ion-icon>
              <center> พ.ศ. 2566 </center> 
          </div>
            <div class="card-body">
              <h5 class="text-center card-title">5,000 บาท</h5>
            </div>
          </div>
        </div>
 
       <div class="col-text-end margitext mt-3 col-sm-2">
          <div class="card text-white bg-secondary mb-3" style="max-width: 15rem;">
            <div class="card-header">
              <ion-icon name="people-outline"></ion-icon>
              <center> พ.ศ. 2565 </center>
          </div>
            <div class="card-body">
              <h5 class="text-center card-title"> 900,000 บาท</h5>
            </div>
          </div>
        </div>
 
       
       <div class="col-text-end margitext mt-3 col-sm-2">
          <div class="card text-white bg-info mb-3" style="max-width: 15rem;">
            <div class="card-header">
              <ion-icon name="people-outline"></ion-icon>
              <center> พ.ศ. 2564 </center>
          </div>
            <div class="card-body">
              <h5 class="text-center card-title">9,999 บาท</h5>
            </div>
          </div>
        </div>
 
        <div class="col-text-end margitext mt-3 col-sm-2">
          <div class="card text-white bg-secondary mb-3" style="max-width: 15rem;">
            <div class="card-header">
              <ion-icon name="people-outline"></ion-icon>
              <center> พ.ศ. 2563 </center>
          </div>
            <div class="card-body">
              <h5 class="text-center card-title"> 11,500,000  บาท</h5>
            </div>
          </div>
        </div>

        <div class="col-text-end margitext mt-3 col-sm-2">
          <div class="card text-white bg-info mb-3" style="max-width: 15rem;">
            <div class="card-header">
              <ion-icon name="people-outline"></ion-icon>
              <center> พ.ศ. 2562 </center>
          </div>
            <div class="card-body">
              <h5 class="text-center card-title"> 11,500,000  บาท</h5>
            </div>
          </div>
        </div>
      </div> <!-- //row -->
      
            <livewire:report-show/>
            
                
                    
            </div>
        </div>
    </div>
</div>
<div class="row mt-4"></div>
<div class="col-md-13"></div>



 <script>
var xValues = ["2566", "2565", "2564", "2563", "2562"];
var yValues = [30, 49, 40, 24, 40];
var barColors = ["SteelBlue", "Chocolate","SteelBlue","Chocolate","SteelBlue"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "กราฟสรุปยอดเงินย้อนหลัง 5 ปี"
    }
  }
});


var xxValues = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
var yyValues = [30, 49, 40, 24, 40, 30, 49, 40, 24, 40, 30, 49];
var barrColors = ["DodgerBlue","LightGray","DodgerBlue","LightGray","DodgerBlue","LightGray","DodgerBlue","LightGray","DodgerBlue","LightGray","DodgerBlue","LightGray"];

new Chart("myChart02", {
  type: "bar",
  data: {
    labels: xxValues,
    datasets: [{
      backgroundColor: barrColors,
      data: yyValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "กราฟสรุปยอดเงินรายเดือนของแต่ละปี"
    }
  }
});
</script>
@endsection