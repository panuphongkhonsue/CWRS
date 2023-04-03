 {{-- แถบเมนูของ พนักงาน --}}


{{-- จนถึง </head> ห้ามแก้ --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/mew/format.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


</head>
<body>
    {{-- แถบข้าง --}}
  <div class="container-fluid h-100">
    <div class="row h-100">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-custom" id="side_bar" style="width: 280px">

        {{-- รูปของคนที่เข้าสู่ระบบ --}}
        <div class="text-center mb-3">
          <img class="img-custom my-3" src="{{ URL::asset('img/' . Auth::user()->id . '.jpg') }}" alt="">
          <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4 mc">{{ _('พนักงาน') }}</span>
          </a>
        </div>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="{{ route('home') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                {{ _('หน้าหลัก') }}
              </a>
            </li>
            <hr>

            {{-- ตรงนี้คือ dropdown ตอนกดเมนู ขอเบิกสวัสดิการ แต่มันยังไม่เป็น dropdown ให้ --}}

                   <div class= "nav-link text-white eiei" >ขอเบิกสวัสดิการ</div>
                   <ul>
                    <li class="dropbu"><a href="{{ route('s.request') }}">บุคคล</a></li>
                    <li class="dropbu"><a href="">สันทนาการ</a></li>
                   </ul>
                   <hr>


                {{-- ปุ่มประวัติ --}}
              <a href="{{ route('history') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                {{ _('ประวัติของฉัน') }}
              </a>

              <a href="{{ route('group_request') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                {{ _('55555555555555') }}
              </a>
            </li>
          </ul>
          <hr>
          {{-- ปุ่ม logout ไม่ต้องแก้หรอก --}}
              <a class="d-flex nav-link text-white" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <img class="" src="{{ URL::asset('/img/logout.png') }}" alt="" width="32" height="32" class="">&ensp;
                  {{ __('Logout') }}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                  </form>
              </a>
        </div>

        {{-- แถบด้านบน --}}
          <nav class="navbar navbar-expand-lg navbar-light shadow-md">
            <a class="navbar-brand text-light" style="margin-left: 50%" href="{{ url('/') }}">
                {{ __('ระบบเบิกสวัสดิการสำหรับพนักงาน') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
ar-collapse text-light" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-na
            <div class="collapse navbv">

                </ul>

                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ms-auto">

                </ul>
            </div>
          </nav>

          <main class="py-5 col-10" style="margin-left: 15%">
            @yield('content')
          </main>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <div id="nav">
      <div class="container-fluid">
        <div class="d-flex" id="side_bar">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-custom" style="width: 280px;">
                <div class="text-center mb-3">
                    <img class="img-custom my-3" src="{{ URL::asset('img/64160299.jpg') }}" alt="">
                    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-4 mc">{{ _('พนักงาน') }}</span>
                </a>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li>
                    <a href="#" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                      {{ _('หน้าหลัก') }}
                    </a>
                  </li>
                  <hr>
                  <li>
                    <a href="#" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                      {{ _('ขอเบิกสวัสดิการ') }}
                    </a>
                  </li>
                  <hr>
                  <li>
                    <a href="#" class="nav-link text-white">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                      {{ _('ประวัติของฉัน') }}
                    </a>
                  </li>
                </ul>
                <hr>
                    <a class="d-flex nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <img class="" src="{{ URL::asset('/img/logout.png') }}" alt="" width="32" height="32" class="">&ensp;
                        {{ __('Logout') }}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                             @csrf
                        </form>
                    </a>
              </div>
            </div>
              <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                    <a class="navbar-brand text-light text-center" href="{{ url('/') }}">
                        {{ __('ระบบเบิกสวัสดิการสำหรับพนักงาน') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">

                        </ul>
                    </div>
                </div>
             </nav>

            <main class="py-5">
              @yield('content')
            </main>

        </div>
      </div>
    </div> --}}
</body>
</html>
