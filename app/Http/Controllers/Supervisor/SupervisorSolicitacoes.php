<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacoes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SupervisorSolicitacoes extends Controller
{


    public function sol_pendentes()
    {

    $supervisor = Auth::user();
    $users = $supervisor->subordinados;
    $solicitacoes = Solicitacoes::whereIn('user_id', $users->pluck('id'))
        ->where('status', 'pendente')
        ->latest('id')
        ->get();
        return view('supervisor.solicitacoes.pendentes', compact('users', 'solicitacoes'));

    }


    public function sol_concluidas(){

        $supervisor = Auth::user();
        $users = $supervisor->subordinados;
        $solicitacoes = Solicitacoes::whereIn('user_id', $users->pluck('id'))
        ->where('status', 'aprovado')
        ->latest('id')
        ->get();

        return view('supervisor.solicitacoes.aprovadas', compact('users', 'solicitacoes'));


    }





    public function salvar(Request $request)
    {

       // Receba os IDs das solicitações aprovadas
    $solicitacoesAprovadas = $request->input('solicitacoes_aprovadas', []);

    // Use esses IDs para recuperar as instâncias das solicitações
    $solicitacoes = Solicitacoes::whereIn('id', $solicitacoesAprovadas)->get();

    // Atualize o campo 'status' dessas instâncias
    foreach ($solicitacoes as $solicitacao) {
        $solicitacao->update(['status' => 'Aprovado']);

    }


    toastr()->success('Solicitações aprovadas com sucesso.');
    // Redirecione ou retorne uma resposta adequada
    return redirect()->back();


    }




    public function excluirSolicitacoes(Request $request){


    // Receba os IDs das solicitações aprovadas
    $solicitacoesExcluir = $request->input('solicitacoes_excluir', []);

    // Use esses IDs para recuperar as instâncias das solicitações
    $solicitacoes = Solicitacoes::whereIn('id', $solicitacoesExcluir)->get();



    // Atualize o campo 'status' dessas instâncias
    foreach ($solicitacoes as $solicitacao) {
        $solicitacao->delete();

    }

    // Redirecione ou retorne uma resposta adequada
    toastr()->success('Solicitações excluídas com sucesso.');
    return redirect()->back();



    }
}
