@extends('layouts.news')
@section('header')
  <title>Criar Conta &middot; Dix News</title>
@endsection
@section('content')
  @include('nana/signup')
  <div class="white-box">
      <form class="form" method="post" action="{{ route('register') }}">
          @csrf

          <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-single-02"></i>
                  </div>
              </div>
              <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                  placeholder="{{ _('Nome') }}" value="{{ old('name') }}" autofocus="true">
              @include('alerts.feedback', ['field' => 'name'])
          </div>
          <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-email-85"></i>
                  </div>
              </div>
              <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ _('Email') }}" value="{{ old('email') }}">
              @include('alerts.feedback', ['field' => 'email'])
          </div>
          <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-lock-circle"></i>
                  </div>
              </div>
              <input type="password" name="password"
                  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                  placeholder="{{ _('Senha') }}">
              @include('alerts.feedback', ['field' => 'password'])
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Criar Conta') }}</button>
      </form>
  </div>
  <div class="white-box">
      <div class="">
          Já possui conta? <a href="{{ route('login') }}" class="btn btn-primary bold">Entrar</a>
      </div>
  </div>
@endsection
