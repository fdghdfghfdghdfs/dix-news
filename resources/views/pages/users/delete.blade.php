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
            <h4 class="card-title ">Você está prestes a deletar o usuário <b>{{ $deleteUser->name }}</b></h4>
            <h4 class="text-danger">Esta é uma ação destrutiva</h4>
          </div>
          <div class="card-body">
          <form class="form" method="post" action="{{ route('pages.user.delete') }}">
            @csrf
            Confirme que tem certeza da ação atual:
            <input name="id" type="hidden" value={{ $deleteUser->id }} />
            <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">Tenho certeza, deletar</button>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
