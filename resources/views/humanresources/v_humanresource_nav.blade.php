{{-- แถบเมนูของ HR --}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/home.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/mew/format.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/contor.js') }}">


</head>
<body>
  <div class="container-fluid h-100">
    <div class="row h-100">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-custom" id="side_bar" style="width: 280px">
        <div class="text-center mb-3">
          <img class="img-custom my-3" src="{{ URL::asset('img/' . Auth::user()->id . '.jpg') }}" alt="">
          <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4 mc">{{ _('ฝ่ายบุคคล') }}</span>
          </a>
        </div>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li>
              <a href="{{ route('home') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                {{ _('คำขออนุมัติ') }}
              </a>
            </li>
            <hr>
            <li class="nav-item dropdown">
              <a href="{{ route('manage_welfare') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                {{ _('จัดการประเภทสวัสดิการ') }}
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="" class="dropdown-item">บุคคล</a>
                    <a href="" class="dropdown-item">สันทนาการ</a>
                </div>
            </li>
            <hr>
            <li>
              <a href="{{ route('history') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                {{ _('รายงานเบิกสวัสดิการ') }}
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

          <nav class="navbar navbar-expand-lg navbar-light shadow-md">
            <a class="navbar-brand text-light" style="margin-left: 50%" href="{{ url('/') }}">
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
          </nav>

          <main class="py-5 col-10" style="margin-left: 15%">
            @yield('content')
          </main>

      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    @livewireScripts
</body>
</html>
