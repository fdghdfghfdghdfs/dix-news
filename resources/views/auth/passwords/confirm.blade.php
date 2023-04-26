@extends('layouts.news')
@section('header')
    <title>Confirmar Senha &middot; Dix News</title>
@endsection
@section('content')
    @include('nana/email')
    <div class="white-box">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirmar Senha') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="white-box">
        <div class="">
            Lembrou sua senha? <a href="{{ route('login') }}" class="btn btn-primary bold">Entrar</a>
        </div>
    </div>
@endsection
