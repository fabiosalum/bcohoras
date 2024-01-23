@extends('admin.layouts.master')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Setores</h4>

        <form action="{{route('setores.store')}}" method="POST" class="forms-sample">
        @csrf
            <div class="form-group">
                <label for="exampleInputUsername1">Nome do setor</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Setor">
            </div>
          <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Setores</h4>

      <div class="table-responsive">
        <table id="myTable" class="table table-hover">
          <thead>
            <tr>
              <th>Nome</th>
              <th style="text-align: center">Ações</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($setores as $setor)
                <tr>
                    <td>{{$setor->nome}}</td>
                    <td style="width: 10%">
                        <a href="#editarsetor-{{$setor->id}}" data-toggle="modal"  class="btn btn-primary m-1">Editar</a>
                             @include('admin.setores.edit')
                    </td>
                     <td style="width: 10%">
                        <a href="#deletarsetor-{{$setor->id}}"  data-toggle="modal" class="btn btn-danger m-1"> Excluir</a>
                             @include('admin.setores.delete')
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>





  @endsection
