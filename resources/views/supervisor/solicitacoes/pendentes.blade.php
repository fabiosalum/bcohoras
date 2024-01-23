@extends('supervisor.layouts.master')
@section('content')

@php
    use Illuminate\Support\Carbon;
@endphp


<form action="{{ route('supervisor.salvar') }}" method="post">
    @csrf
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Solicitações Pendentes</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Funcionário</th>
                                <th>Data</th>
                                <th>Quantidade de Horas</th>
                                <th>Motivo</th>
                                <th>Entrada/Saída</th>
                                <th>Status</th>
                                <th>Aprovar</th>
                                {{-- <th>Ações</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitacoes as $sol)
                                <tr>
                                    <td>{{$sol->users->name}}</td>
                                    <td>{{Carbon::parse($sol->data_movimentacao)->format('d/m/Y')}}</td>
                                    <td>{{$sol->qtde_horas}}</td>
                                    <td>{{$sol->motivo}}</td>
                                    <td>{{$sol->regras}}</td>
                                    <td><label class="badge badge-danger">{{$sol->status}}</label></td>
                                    <td>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="solicitacoes_aprovadas[]" value="{{$sol->id}}">
                                            Aprovar<i class="input-helper"></i></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-5">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>





@endsection
