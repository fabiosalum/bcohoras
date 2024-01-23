<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacoes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class lacamentosController extends Controller
{
    public function index()
    {

        $supervisor = Auth::user();
        $users = $supervisor->subordinados;
        return view('supervisor.lancamentos.index', compact('users'));
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
