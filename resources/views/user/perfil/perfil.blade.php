@extends('supervisor.layouts.master')
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

                <form action="{{route('user.salvar.perfil', $user->id)}}" class="forms-sample" method="POST">

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
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="senha">
                    </div>


                    <button type="submit" class="btn btn-primary mr-2 mt-3 mb-2">Salvar</button>
                    <a href="{{ route('user.painel') }}" class="btn btn-light">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
