@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('News'), 'pageSlug' => 'tables'])
@section('title')
<title>{{ $updateNews->title }} &middot; Dix News</title>
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div style="margin-bottom: 15px;">
              <a href="{{ route('pages.users') }}">< Voltar</a>
            </div>
            <h4 class="card-title ">{{ $updateNews->title }}</h4>
            <p class="card-category">Atualizar Notícia</p>
          </div>
          <div class="card-body">
          <form class="form" method="post" action="{{ route('pages.news-update.update') }}">
          @csrf
          <input name="id" type="hidden" value="{{ $updateNews->id }}" />
          <div class="input-group{{ $errors->has('title') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-pencil"></i>
                  </div>
              </div>
              <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                  placeholder="{{ _('Título') }}" value="{{ $updateNews->title }}" autofocus="true">
              @include('alerts.feedback', ['field' => 'title'])
          </div>
          <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-paper"></i>
                  </div>
              </div>
              <textarea name="content" class="form-control textarea-custom{{ $errors->has('content') ? ' is-invalid' : '' }}"
                  placeholder="{{ _('Notícia') }}">{{ $updateNews->content }}</textarea>
              @include('alerts.feedback', ['field' => 'content'])
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Enviar') }}</button>
      </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
