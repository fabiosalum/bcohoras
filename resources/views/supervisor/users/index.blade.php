@extends('supervisor.layouts.master')

@section('css')

<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<style type="text/css">

    .dataTables_filter {
        padding-right: 25px;
    };


</style>

@endsection

@section('content')

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Gerenciar Usuários</h4>


        <a style="float: right" href="{{route('usuarios.create')}}" class="btn btn-primary m-4"><i class="fas fa-plus-circle"></i> Adicionar Usuário</a>

      <div class="table-responsive">
        <table id="usuarios" class="table table-hover">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Matrícula</th>
              <th>Tipo de Usuário</th>
              <th>Supervisor</th>
              <th>Setor</th>
              <th style="text-align: center">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->matricula}}</td>
                <td>{{$user->regras}}</td>

                {{-- <td><label class="badge badge-success p-2" value="{{$user->status}}">{{($user->status == 1 ? "Ativo" : "Inativo")}}</label></td>--}}

                <td value="{{$user->supervisor_id}}">{{$user->supervisor->name}}</td>
                <td>{{ $user->setor->nome}}</td>

                <td style="text-align: center"><a href="{{route('usuarios.edit', $user->id)}}" class="btn btn-primary m-1 p-2">Editar</a>
                {{-- <a href="javascript:if(confirm('Deseja realmente excluir o usuário {{$user->name}} ?')){
                                            window.location.href = '{{route('supervisor.delete', $user->id)}}'
                                            }" class="btn btn-danger m-1 p-2"> Excluir</a></td>
                </tr> --}}
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>


 @push('scripts')

    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#usuarios').DataTable( {

                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"

                }

            } );
        } );

    </script>


@endpush

@endsection
