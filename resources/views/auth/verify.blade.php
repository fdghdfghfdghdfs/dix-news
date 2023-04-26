@extends('layouts.news')
@section('header')
  <title>Verificar &middot; Dix News</title>
@endsection
@section('content')
    @include('nana/signin')
    <div class="white-box">
      @if (session('resent'))
          <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
      @endif

      {{ __('Before proceeding, please check your email for a verification link.') }}

      @if (Route::has('verification.resend'))
          {{ __('If you did not receive the email') }},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
          </form>
      @endif
    </div>
    <div class="white-box">
        <div class="">
          Não possui conta? <a href="{{ route('register') }}" class="btn btn-primary bold">Criar Conta</a>
        </div>
    </div>
@endsection
