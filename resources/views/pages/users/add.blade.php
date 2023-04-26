@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('News'), 'pageSlug' => 'tables'])
@section('title')
<title>Usuários &middot; Dix News</title>
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
            <h4 class="card-title ">Criar novo usuário</h4>
            <p class="card-category">para criar um novo usuário, preencha os campos abaixo:</p>
          </div>
          <div class="card-body">
          <form class="form" method="post" action="{{ route('pages.user.create') }}">
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
          <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ _('Criar Usuário') }}</button>
      </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
