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
            <h4 class="card-title ">{{ $updateUser->name }}</h4>
            <p class="card-category">Atualizar detalhes de usuário</p>
          </div>
          <div class="card-body">
          <form class="form" method="post" action="{{ route('pages.user.update') }}">
            @csrf
            <input name="id" type="hidden" value="{{ $updateUser->id }}" />
            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-single-02"></i>
                  </div>
              </div>
                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    placeholder="{{ _('Nome') }}" autofocus="true" value="{{ $updateUser->name }}">
                @include('alerts.feedback', ['field' => 'name'])
            </div>
            <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group-prepend">
                  <div class="input-group-text">
                      <i class="tim-icons icon-email-85"></i>
                  </div>
              </div>
                <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    placeholder="{{ _('Email') }}" autofocus="true" value="{{ $updateUser->email }}">
                @include('alerts.feedback', ['field' => 'email'])
            </div>
            <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">Atualizar</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
