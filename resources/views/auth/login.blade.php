@extends('layouts.news')
@section('header')
  <title>Entrar &middot; Dix News</title>
@endsection
@section('content')
    @include('nana/signin')
    <div class="white-box">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-email-85"></i>
                    </div>
                </div>
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    placeholder="{{ _('Email') }}" autofocus="true">
                @include('alerts.feedback', ['field' => 'email'])
            </div>
            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                    </div>
                </div>
                <input type="password" placeholder="{{ _('Senha') }}" name="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @include('alerts.feedback', ['field' => 'password'])
            </div>
            <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">Entrar</button>
        </form>
        <a href="{{ route('password.request') }}">Equeceu sua senha?</a>
    </div>
    <div class="white-box">
        <div class="">
          Não possui conta? <a href="{{ route('register') }}" class="btn btn-primary bold">Criar Conta</a>
        </div>
    </div>
@endsection
