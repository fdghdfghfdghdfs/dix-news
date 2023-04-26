@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('News'), 'pageSlug' => 'tables'])
@section('title')
<title>Notícias &middot; Dix News</title>
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
              <h4 class="card-title ">Notícias</h4>
              <p class="card-category">Publique e gerencie suas notícias</p>
            </div>
            <div>
              <a class="btn btn-primary btn-sm" href="{{ route('pages.news.create_view') }}">Nova notícia</a>
            </div>
          </div>
          <div class="card-body">
          <div style="display: flex; align-items: center;gap: 8px;">
            <input placeholder="Para buscar por notícias informe o termo abaixo e então clique em buscar..." id="search" type="text" value="@if(isset($searchValue)){{$searchValue}}@endif" class="form-control" />
            <button class="btn btn-primary" onclick="event.preventDefault(); window.location = '/news/' + document.getElementById('search').value">Buscar</button>
            @if (isset($searchValue))
              <a href="{{ route('home') }}" class="btn btn-secondary">Limpar filtro</a>
            @endif
          </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Título
                  </th>
                  <th>
                    Conteúdo
                  </th>
                  <th>
                    Hits (Visualizações)
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  @foreach ($news as $n)
                    <tr>
                      <td>
                        {{ $n->title }}
                      </td>
                      <td>
                        {{ $n->content }}
                      </td>
                      <td>
                        {{ $n->hit }}
                      </td>
                      <td>
                        <a href="{{ route('pages.news.view', $n->id) }}">Ver</a>
                        <a href="{{ route('pages.news-update', $n->id) }}">Atualizar</a>
                        <a href="{{ route('pages.news.delete_view', $n->id) }}">Deletar</a>
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
