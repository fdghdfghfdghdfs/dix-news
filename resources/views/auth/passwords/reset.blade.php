@extends('layouts.news')
@section('header')
  <title>Recuperar Conta &middot; Dix News</title>
@endsection
@section('content')
  @include('nana/signup')
  <div class="white-box">
      <form class="form" method="post" action="{{ route('password.update') }}">
            @csrf
            @include('alerts.success')

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirm Password') }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Reset Password') }}</button>
        </form>
  </div>
  <div class="white-box">
      <div class="">
          Lembrou sua senha? <a href="{{ route('login') }}" class="btn btn-primary bold">Entrar</a>
      </div>
  </div>
@endsection
