<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacoes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserLancamento extends Controller
{
    public function index()
    {

        $usuario = Auth::user();
        //$users = $supervisor->subordinados;
        return view('user.lancamentos.index', compact('usuario'));
    }

    public function store(Request $request)
    {

        $solicitacoes = new Solicitacoes();

        $solicitacoes->user_id = $request->user_id;
        $solicitacoes->data_movimentacao = $request->data_lancamento;
        $solicitacoes->qtde_horas = $request->qtde_horas;
        $solicitacoes->hora_inicio = $request->hora_inicio;
        $solicitacoes->hora_final = $request->hora_final;
        $solicitacoes->motivo = $request->motivo;
        $solicitacoes->regras = $request->optionsRadios;

        $solicitacoes->save();
        toastr()->success('Solicitações enviadas com sucesso.');
        return redirect()->back();
    }

}
