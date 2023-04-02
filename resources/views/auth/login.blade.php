@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" ><img id="logo" src="{{ URL::asset('img/clicknext.png') }}" class="rounded-circle bg-white" alt=""></div>
    <div class="row justify-content-center" style="margin-top: 13%">
        <div class="col-md-5">
            <div class="card" style="padding-top: 180px">
                <div class="card-body col-md-7 align-self-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if(Session::has('message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        <div class="row mb-3">
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

                        <div class="row mb-3">
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
