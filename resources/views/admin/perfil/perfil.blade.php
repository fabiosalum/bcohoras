@extends('admin.layouts.master')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Perfil</h4>

                <ul>
                    @foreach ($errors->all() as $erro)
                        <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
                    @endforeach
                </ul>

                <form action="{{route('admin.salvar.perfil', $user->id)}}" class="forms-sample" method="POST">

                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                            value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matrícula"
                            value="{{ $user->matricula }}">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="senha">
                    </div>

                    @php
                        $selectedSupervisor = isset($user->supervisor_id) ? $user->supervisor_id : old('supervisor_id');
                    @endphp

                    <div class="form-group">
                        <label for="supervisor">Supervisor</label>
                        <select class="form-control form-control-sm" id="supervisor" name="supervisor">
                            @foreach ($supervisors as $sup)
                                <option value="{{ $sup->id }}" {{ $selectedSupervisor == $sup->id ? 'selected' : '' }}>
                                    {{ $sup->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @php
                    $selectedSetor = isset($user->setor_id) ? $user->setor_id : old('setor_id');
                    @endphp

                    <div class="form-group">
                        <label for="setor">Setor</label>
                        <select class="form-control form-control-sm" id="setor" name="setor">
                            @foreach ($setores as $setor)
                                <option value="{{ $setor->id }}" {{ $selectedSetor == $setor->id ? 'selected' : '' }}>
                                    {{ $setor->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
{{--
                    <div class="form-group">
                        <label for="status">Setor</label>
                        <select class="form-control form-control-sm" id="setor" name="setor"
                            value="{{ $user->setor_id }}">
                            @foreach ($setores as $setor)
                                <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                            @endforeach

                        </select>
                    </div> --}}

                    <button type="submit" class="btn btn-primary mr-2 mt-3 mb-2">Salvar</button>
                    <a href="{{ route('admin.painel') }}" class="btn btn-light">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
