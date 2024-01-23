@extends('supervisor.layouts.master')
@section('content')


<form class="forms-sample" action="{{route('lancamentos.store')}}" method="POST">
    @csrf

        <div class="form-group">
            <label for="users">Funcionário</label>
            <select class="form-control" id="users" name="user_id" >
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Banco de Horas</h4>
                <div class="form-group col-md-3">
                <label for="data_lancamento">Data de Lançamento</label>
                <input type="date" class="form-control" id="data_lancamento" value="<?php echo date("Y-m-d"); ?>" name="data_lancamento">
                </div>
                <div class="form-group col-md-3">
                <label for="qtde_horas">Quantidade de Horas</label>
                <input type="time" class="form-control" id="qtde_horas" name="qtde_horas">
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="qtde_horas">Hora de Início</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="qtde_horas">Hora final</label>
                        <input type="time" class="form-control" id="hora_final" name="hora_final">
                    </div>
                </div>
                <div class="form-group">
                <label for="motivo">Motivo</label>
                <input type="text" class="form-control" id="motivo" name="motivo">
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="entrada" checked="">
                                Entrada
                                <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="saida" >
                                Saída
                                <i class="input-helper"></i></label>
                            </div>
                            </div>
                        </div>

                <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
            </div>
        </div>
</form>





@endsection
