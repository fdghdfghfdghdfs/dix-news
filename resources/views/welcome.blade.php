@extends('layouts.news')
@section('header')
  <title>Dix News &middot; Bem vindo(a) a Dix News!</title>
@endsection
@section('content')
  @auth
    <a href="{{ route('pages.news.news') }}">
      < Voltar para o dashboard
    </a>
    <div class="flex-container">
      <div class="max-content">
    <div class="white-box">
      Todo o gerenciamento de notícias é realizado no seu <b>Dashboard</b>.
    </div>
    <div class="white-box">
      Autenticado como <b>{{ Auth::user()->name }}</b> &middot; <b>{{ Auth::user()->email }}</b>
    </div>
    <div class="white-box flex row">
      <div>
        Opções
      </div>
      <a href="{{ route('home') }}">
        Voltar para o Dashboard
      </a>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
        Sair
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    </div>
    </div>
    </div>
  @else
    <div class="flex-container">
      <div class="max-content">
      <div class="nana-notification">
      <div class="text--italic text--small left-auto">
        <span class="bold">Bem vindo(a) a Dix News!</span> Para começar a publicar e gerenciar suas próprias notícias você precisa <a class="bold btn btn-primary" href="{{ route('login') }}">entrar</a> ou <a class="bold btn btn-primary" href="{{ route('register') }}">criar uma conta</a>
      </div>
    </div>
    @include('nana/header')
    <div class="placeholder flex">
      <div class="path-title"></div>
    </div>
    <div class="placeholder flex">
      <div class="path-title"></div>
      <div class="path-line long"></div>
      <div class="path-line medium"></div>
      <div class="path-line small"></div>
      <div class="path-line smaller"></div>
    </div>
    <div class="placeholder flex">
      <div class="path-title"></div>
      <div class="path-line long"></div>
      <div class="path-line medium"></div>
      <div class="path-line small"></div>
      <div class="path-line smaller"></div>
    </div>
    <div class="placeholder flex row">
      <div class="path-line small"></div>
      <div class="path-line small left-auto"></div>
    </div>
    <div class="just-properties include-horizontal flex row">
      <div>
        © 2023 Dix &middot; Dix e Dix Logo São marcas registradas da Dix Software, todos os direitos reservados.
      </div>
      <div class="left-auto">
        Feito no Tocantins. <a href="https://dix.digital" target="_blank" rel="referrer noreferrer">Visite a Dix</a>
      </div>
    </div>
    <div class="just-properties include-horizontal ignore-vertical">
      <span class="bold">Todas as notícias publicadas aqui são de propriedade de seus respectivos proprietários e não refletem a opinião da Dix e nem de seus parceiros.</span>
    </div>
      </div>
    </div>
  @endauth
@endsection
