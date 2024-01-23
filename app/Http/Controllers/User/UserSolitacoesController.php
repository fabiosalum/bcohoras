<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitacoes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserSolitacoesController extends Controller
{
    public function sol_pendentes()
    {

    $usuario = Auth::user();

    $solicitacoesuser = Solicitacoes::where('user_id', $usuario->id)
        ->where('status', 'pendente')
        ->latest('id')
        ->get();
        return view('user.solicitacoes.pendentes', compact('usuario', 'solicitacoesuser'));

    }


    public function sol_concluidas(){

        $usuario = Auth::user();

        $solicitacoesuser = Solicitacoes::where('user_id', $usuario->id)
            ->where('status', 'aprovado')
            ->latest('id')
            ->get();
            return view('user.solicitacoes.aprovadas', compact('usuario', 'solicitacoesuser'));


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
    toastr()->success('Solicitações deletadas com sucesso.');
    return redirect()->back();



    }
}
