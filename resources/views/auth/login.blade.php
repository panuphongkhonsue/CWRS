@extends('layouts.app')

@section('content')
<div class="container">

    <!-- รูปโลโก้บริษัท -->
    <div class="container">
        <div class="card-login" >
            <img src="/img/clicknext.png" alt="" class="img-login">

            <div>
                    {{--  <div class="card bg-info" style="padding-top: 180px">
                            <div class="card-body bg-danger col-md-7 align-self-center"> --}}
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @if(Session::has('message'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif

                                        <!-- กล่องข้อความสำหรับกรอก Username -->
                                    <div class="row">
                                        <div class="col-md-2 input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="{{ URL::asset('img/user.png') }}" class="img-rounded" alt="" width="26" height="26"></span>
                                            </div>
                                            <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

                                            @error('id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                        <!-- กล่องข้อความสำหรับกรอก Password -->
                                    <div class="row mb-4">
                                        <div class="col input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><img src="{{ URL::asset('img/lock.png') }}" class="img-rounded" alt="" width="26" height="26"></span>
                                            </div>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                        <!-- ปุ่ม Sign in -->
                                    <div class="row mb-0">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-success">
                                                {{ __('Sign in  ') }}
                                            </button>
                                        </div>

                                    </div>
                                </form>
                    </div>

        </div>
    </div>


    </div>
</div>
@endsection
