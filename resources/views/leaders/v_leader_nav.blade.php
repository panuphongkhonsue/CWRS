{{-- แถบเมนูของหัวหน้าแผนก --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css') }}">

</head>
<body>
    <div class="container-fluid h-100">
    <div class="row h-100">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-custom" id="side_bar" style= "left: -300px"><!-- wait fix -->
      <a href="javascript:void(0);" class="icon">
      <i class="fa fa-bars" id = "hamburMenu1" onclick="closeNav()" style="font-size: 30px"></i>  <!-- Hamburger menu -->
      </a>
      <hr>
        <div class="text-center mb-3">
          <img class="img-custom my-3" src="{{ URL::asset('img/' . Auth::user()->id . '.jpg') }}" alt="">
          <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4 mc">{{ __('หัวหน้าแผนก') }}</span>
          </a>
        </div>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="{{ route('home') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                {{ _('คำขอรับรอง') }}
              </a>
            </li>
            <hr>

            <li>
              <a class="btn nav-link text-white text-start dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false" fdprocessedid="xlnb4i">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                ขอเบิกสวัสดิการ
              </a>

              <div class="collapse" id="home-collapse" style="" >
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ms-5">
                  <li><a href="{{ route('s.request') }}" class="nav-link text-white" style="text-decoration: none">บุคคล</a></li>
                  <li><a href="" class="nav-link text-white" style="text-decoration: none">สันทนาการ</a></li>
                </ul>
              </div>
            </li>
            <hr>

            <li>
              <a href="{{ route('history') }}" class="nav-link text-white">
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

        <ul class="navbar navbar-expand-lg navbar-light shadow-md justify-content-center py-2">
            <a href="javascript:void(0);" class="icon">
            <i class="fa fa-bars" id = "hamburMenu2" onclick= "openNav()" style="font-size: 30px"></i>  <!-- Hamburger menu -->
              <li class="navbar-nav">
                  <a class="navbar-brand text-light"  href="{{ url('/') }}">

                  </a>
              </li>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav">

                  </ul>

                  <!-- Right Side Of Navbar -->

                  <ul class="navbar-nav ms-auto me-auto">
                      <li class="fs-5">ระบบเบิกสวัสดิการพนักงาน</li>
                  </ul>
              </div>
          </ul>

            <div class="row justify-content-center">
              <main class="py-3 col-lg-10">
                  @yield('content')
                </main>
            </div>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    function openNav() {
      document.getElementById("side_bar").style.left = "0px";
    }

    function closeNav() {
      document.getElementById("side_bar").style.left = "-300px";
    }
    </script>


</body>
</html>
