@extends('layouts.app')

<!--
/*
* v_leader_home.blade.php
* แสดงหน้าหลักของหัวหน้าแผนก
* @input  : -
* @output : แสดงข้อมูลคำร้องขอของพนักงาน
* @author : พนิดา ถำวาปี 64160167 เบญจมาภรณ์ วงค์วิริยะ 64160165 และรวิชญ์ พิบูลย์ศิลป์ 64160299
* @Create Date : 2023-04-06
*/ -->

@section('content')
<div class="container">

    <!-- รูปโลโก้บริษัท -->
    <div class="container">
        <div class="card-login bot">
            <img src="./img/clicknext.png" alt="" class="img-login">

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <!-- กล่องข้อความสำหรับกรอก Username -->
                    <div class="row">
                        <div class="col-md-2 input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img src="{{ URL('./img/user.png') }}" class="img-rounded" alt="" width="26" height="26"></span>
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
                    <div class="row">
                        <div class="col input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img src="{{ URL('./img/lock.png') }}" class="img-rounded" alt="" width="26" height="26"></span>
                            </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- แจ้งเตือน --}}
                    <div class="row">
                        @if(Session::has('message'))
                            <div class="alert text-danger">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </div>

                        <!-- ปุ่ม Sign in -->
                    <div class="row mb-0">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success" style="position: absolute; top: 80%; left: calc(50% - 35px)">
                                {{ __('Sign in  ') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection

