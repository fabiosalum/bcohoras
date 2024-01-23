@extends('supervisor.layouts.master')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Criar Novo Usuário</h4>

        <ul>
            @foreach ($errors->all() as $erro)
                <li style="color: red; padding-left:20px; margin-top:20px " >{{$erro}}</li>
            @endforeach
        </ul>

        <form action="{{route('usuarios.store')}}" class="forms-sample" method="POST">
            @csrf
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="Nome">
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matrícula">
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="senha">
          </div>
          {{-- <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control form-control-sm" id="status" name="status">
              <option value="1">Ativo</option>
              <option value="0">Inativo</option>
            </select>
          </div> --}}
          <div class="form-group">
            <label for="status">Supervisor</label>
            <select class="form-control form-control-sm" id="supervisor" name="supervisor">
                @foreach ($users as $user)
                    @if ($user->regras == 'supervisor' || $user->regras == 'admin')
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="status">Setor</label>
            <select class="form-control form-control-sm" id="setor" name="setor">
                @foreach ($setores as $setor)
                    <option value="{{$setor->id}}">{{$setor->nome}}</option>
                @endforeach

            </select>
          </div>
          <div class="row">
            <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="regras[]" id="admin" value="admin">
                    Administrador
                  <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="regras[]" id="supervisor" value="supervisor" >
                    Supervisor
                  <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="regras[]" id="user" value="user" checked="select" >
                    Usuário
                  <i class="input-helper"></i></label>
                </div>
              </div>
        </div>
                <button type="submit" class="btn btn-primary mr-2 mt-3 mb-2">Salvar</button>
                <a href="{{route('usuarios.index')}}" class="btn btn-light">Voltar</a>
        </form>
      </div>
    </div>
  </div>



@endsection
