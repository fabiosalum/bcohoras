@extends('admin.layouts.master')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Configuração</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Cidade</h4>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Cidade</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$config->nome}}</td>
              <td><a href="#editarconfig-{{$config->id}}" data-toggle="modal"  class="btn btn-primary m-1">Editar</a>
              @include('admin.configuracao.edit')
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
