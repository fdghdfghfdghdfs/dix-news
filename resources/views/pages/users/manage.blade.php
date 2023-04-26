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
          <div class="card-header card-header-primary"
          style="display: flex;align-items:center;padding:15px 15px 15px;">
            <div style="flex-grow: 1;">
              <h4 class="card-title ">Usuários</h4>
              <p class="card-category">Gerencie os usuários da plataforma</p>
            </div>
            <div>
              <a class="btn btn-primary btn-sm" href="{{ route('pages.user.create_view') }}">Novo usuário</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nome
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>
                        {{ $user->id }}
                      </td>
                      <td>
                        {{ $user->name }}
                      </td>
                      <td>
                        {{ $user->email }}
                      </td>
                      <td>
                        <a href="{{ route('pages.user', $user->id) }}">
                         Atualizar
                        </a>
                        @if (Auth::user()->id !== $user->id)
                          <a href="{{ route('pages.user.delete_view', $user->id) }}">
                            Deletar
                          </a>
                        @endif
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
