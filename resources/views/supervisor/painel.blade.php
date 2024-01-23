@extends('supervisor.layouts.master')

@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

@endsection


@section('content')

@php
    use Illuminate\Support\Carbon;
    $datetime = Carbon::now();
@endphp

<div class="card">
    <div class="card-body dashboard-tabs p-0">
      <ul class="nav nav-tabs px-4" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Visão geral</a>
        </li>
      </ul>
      <div class="tab-content py-0 px-0">
        <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview-tab">
          <div class="d-flex flex-wrap justify-content-xl-between">


            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Total de usuários do setor</small>
                <h5 class="mr-2 mb-0">{{$users_count}}</h5>
              </div>
            </div>
            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-clock-fast mr-3 icon-lg text-warning"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Solicitações Pendentes</small>
                <h5 class="mr-2 mb-0">{{$count_pendentes}}</h5>
              </div>
            </div>
            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
              <i class="mdi mdi-checkbox-marked-outline mr-3 icon-lg text-danger"></i>
              <div class="d-flex flex-column justify-content-around">
                <small class="mb-1 text-muted">Solicitações Aprovadas</small>
                <h5 class="mr-2 mb-0">{{$count_aprovadas}}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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
