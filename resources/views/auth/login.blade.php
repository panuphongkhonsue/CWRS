@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top : 5%"><img id="logo" src="{{ URL::asset('img/clicknext.png') }}" class="rounded-circle bg-white" alt=""></div>
    <div class="row justify-content-center" style="margin-top: 13%">
        <div class="col-md-6">
            <div class="card" style="padding-top: 180px">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if(Session::has('message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">

                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mt-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
