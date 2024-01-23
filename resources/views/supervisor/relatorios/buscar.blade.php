@extends('supervisor.layouts.master')


@section('css')

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

@endsection



@section('content')


@php
    use Illuminate\Support\Carbon;
@endphp

<div class="col-md-12 grid-margin">
    <div class="d-flex justify-content-between flex-wrap">
      <div class="d-flex align-items-end flex-wrap">
        <div class="mr-md-3 mr-xl-5">
          <h2>Funcionário {{$user->name}}</h2>
          <strong><p class="mb-md-0"> Setor de {{$user->setor->nome}}</p></strong>
          <p class="mb-md-0">Relatório Banco de Horas</p>
        </div>

      </div>
    </div>
  </div>

<div class="row">
<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Banco de Horas (Entradas)</h4>
        <div class="table-responsive ">
          <table id="entradas" class="table table-hover">
            <thead>
              <tr>
                {{-- <th>Funcionário</th> --}}
                <th>Data</th>
                <th>Quantidade de Horas</th>
                <th>Hora de início | final</th>
                <th>Motivo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($sol_entradas as $sol_entrada)
                    <tr>
                        {{-- <td>{{$sol_entrada->users->name}}</td> --}}
                        <td>{{Carbon::parse($sol_entrada->data_movimentacao)->format('d/m/Y')}}</td>
                        <td>{{$sol_entrada->qtde_horas}}</td>
                        <td>{{$sol_entrada->hora_inicio}} | {{$sol_entrada->hora_final}}</td>
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
        <h4 class="card-title ">Banco de Horas (Saídas)</h4>
        <div class="table-responsive ">
          <table id="saidas" class="table table-hover">
            <thead>
              <tr>
                {{-- <th>Funcionário</th> --}}
                <th>Data</th>
                <th>Quantidade de Horas</th>
                {{-- <th>Motivo</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($sol_saidas as $sol_saida)
                    <tr>
                        {{-- <td>{{$sol_saida->users->name}}</td> --}}
                        <td>{{Carbon::parse($sol_saida->data_movimentacao)->format('d/m/Y')}}</td>
                        <td>{{$sol_saida->qtde_horas}}</td>
                        {{-- <td> {{$sol_saida->motivo}} </td> --}}
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
        <h4 class="card-title">Total de Horas</h4>
        <div>
                <div><h4 class="badge badge-success" style="font-size: 20px">Total de Entradas = {{$totalSolicitacoes_entradasFormatado}}</h4></div>
                <div><h4 class="badge badge-danger" style="font-size: 20px">Total de Saídas = {{$totalSolicitacoes_saidasFormatado}}</h4></div>

                @if($totalSolicitacoes_entradasFormatado >= $totalSolicitacoes_saidasFormatado)
                    <div><h4 class="badge badge-info" style="font-size: 20px">Total Geral = Saldo Positivo {{$formatoDiferenca}}</h4></div>
                @else
                    <div><h4 class="badge badge-danger" style="font-size: 20px">Total Geral = Saldo Negativo {{$formatoDiferenca}}</h4></div>
                @endif


        </div>
      </div>
    </div>
</div>


</div>

<div>
    <div>
    <form action="{{route('sup.relatorios.pdf', $user->id)}}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary mt-2 mt-xl-0" style="float: right">Gerar PDF</button>
    </form>
    </div>
    <a href="{{route('supervisor.relatorios.index')}}" class="btn btn-secondary mt-2 mr-2 mt-xl-0" style="float:right">Voltar</a>
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
