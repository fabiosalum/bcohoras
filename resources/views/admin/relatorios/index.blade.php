@extends('admin.layouts.master')

@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

@endsection


@section('content')

@php
    use Illuminate\Support\Carbon;
@endphp

<form class="forms-sample" action="{{route('relatorios.buscar')}}" method="POST">
    @csrf

        <div class="form-group">
            <label for="users">Funcionário</label>
            <select class="form-control" id="users" name="user" >
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mr-2 mb-3">Buscar</button>
</form>



<div class="row mt-5">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Banco de Horas (Entradas)</h4>
            <div class="table-responsive ">
              <table id="entradas" class="table table-hover">
                <thead>
                  <tr>
                    <th>Funcionário</th>
                    <th>Data</th>
                    <th>Quantidade de Horas</th>
                    <th>Motivo</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sol_entradas as $sol_entrada)
                        <tr>
                            <td >{{$sol_entrada->users->name}}</td>
                            <td>{{Carbon::parse($sol_entrada->data_movimentacao)->format('d/m/Y')}}</td>
                            <td>{{$sol_entrada->qtde_horas}}</td>
                            <td> {{$sol_entrada->motivo}} </td>
                        </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>


    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Banco de Horas (Saídas)</h4>
            <div class="table-responsive ">
              <table id="saidas" class="table table-hover">
                <thead>
                  <tr>
                    <th>Funcionário</th>
                    <th>Data</th>
                    <th>Quantidade de Horas</th>
                    <th>Motivo</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sol_saidas as $sol_saida)
                        <tr>
                            <td>{{$sol_saida->users->name}}</td>
                            <td>{{Carbon::parse($sol_saida->data_movimentacao)->format('d/m/Y')}}</td>
                            <td>{{$sol_saida->qtde_horas}}</td>
                            <td> {{$sol_saida->motivo}} </td>
                        </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>


    </div>

@push('scripts')

    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#entradas').DataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            } );
        } );

    </script>

    <script>

        $(document).ready(function() {
            $('#saidas').DataTable( {
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            } );
        } );

    </script>

@endpush


  @endsection
