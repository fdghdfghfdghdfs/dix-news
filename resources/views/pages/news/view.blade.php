@extends('layouts.news')
@section('header')
  @if ($can_view)
    <title>{{ $news->title }} &middot; Dix News</title>
  @else
    <title>Dix News &middot; 404</title>
  @endif
@endsection
@section('content')
  <a href="{{ route('pages.news.news') }}">
    < Voltar para o dashboard
  </a>
  @if ($can_view)
    @auth
    <div class="flex-container">
      <div class="max-content">
    @include('nana/header')
    <div class="just-properties include-horizontal">
      Autor: {{ Auth::user()->name }} &middot; Data da publicação: {{ $news->created_at }}
    </div>
    <div class="white-box">
      <b>{{ $news->title }}</b>
    </div>
    <div class="white-box">
      {{ $news->content }}
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
  @else
  <div class="flex-container">
      <div class="max-content">
    @include('nana/header')
    <div class="white-box">
     A notícia pela qual você estava procurando não existe ou você não tem permissão para visualizá-la.
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
  @endif
@endsection
