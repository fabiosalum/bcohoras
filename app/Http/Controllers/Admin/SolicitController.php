<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitacoes;
use Illuminate\Http\Request;
use App\Models\User;

class SolicitController extends Controller
{


    public function solconcluidas(){

        $users = User::all();

        $solicitacoes = Solicitacoes::where('status', 'aprovado')->latest('id')->get();


        return view('admin.solicitacoes.aprovadas', compact('users', 'solicitacoes'));

    }



    public function solpendentes()
    {


       $users = User::all();


        $solicitacoes = Solicitacoes::where('status', 'pendente')->latest('id')->get();


        return view('admin.solicitacoes.pendentes', compact('users', 'solicitacoes'));

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

    // Redirecione ou retorne uma resposta adequada

    toastr()->success('Solicitações aprovadas com sucesso.');
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
