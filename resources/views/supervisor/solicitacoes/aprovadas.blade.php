@extends('supervisor.layouts.master')
@section('content')

@php
    use Illuminate\Support\Carbon;

@endphp


<form  action="{{ route('supervisor.excluir') }}" method="post" id="form-exclusao" >
    @csrf
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Solicitações Aprovadas</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Funcionário</th>
                                <th>Data</th>
                                <th>Quantidade de Horas</th>
                                <th>Motivo</th>
                                <th>Entrada/Saída</th>
                                <th>status</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitacoes as $sol)
                                <tr>
                                    <td >{{$sol->users->name}}</td>
                                    <td>{{Carbon::parse($sol->data_movimentacao)->format('d/m/Y')}}</td>
                                    <td>{{$sol->qtde_horas}}</td>
                                    <td> {{$sol->motivo}} </td>
                                    <td> {{$sol->regras}} </td>
                                    <td> <label class="badge badge-success"> {{$sol->status}}</label> </td>
                                    <td><div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input"  name="solicitacoes_excluir[]" value="{{ $sol->id }}">
                                          Excluir
                                        <i class="input-helper"></i></label>
                                      </div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button id="form-exclusao" type="submit" class="btn btn-danger mt-4" onclick="confirmarExclusao()">Excluir Solicitações</button>
                </div>
            </div>
        </div>
    </div>
</form>



@push('scripts')
    <script>
        function confirmarExclusao() {
            if (confirm('Tem certeza que deseja excluir as solicitações selecionadas?')) {
                document.getElementById('form-exclusao').submit();
            }
        }
    </script>

@endpush


@endsection
