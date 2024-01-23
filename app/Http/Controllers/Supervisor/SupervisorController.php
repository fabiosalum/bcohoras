<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setor;
use App\Models\Solicitacoes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    public function index(){

        $supervisorLogado = Auth::getUser();

        $subordinados = $supervisorLogado->subordinados;

        $users_count = $supervisorLogado->subordinados->count();

        $supervisor = Auth::user();
        $users = $supervisor->subordinados;
        $sol_entradas = Solicitacoes::whereIn('user_id', $users->pluck('id'))
            //->where('status', 'pendente')
            ->where('regras', '=', 'entrada')
            ->get();

        $sol_saidas = Solicitacoes::whereIn('user_id', $users->pluck('id'))
            //->where('status', 'pendente')
            ->where('regras', '=', 'saida')
            ->get();


        $count_pendentes = Solicitacoes::whereIn('user_id', $users->pluck('id'))
            ->where('status', 'pendente')->count();
        $count_aprovadas = Solicitacoes::whereIn('user_id', $users->pluck('id'))
            ->where('status', 'aprovado')->count();

            return view ('supervisor.painel', compact('subordinados', 'count_pendentes', 'count_aprovadas', 'users_count','sol_entradas', 'sol_saidas'));
    }


    public function editarPerfil(){

        $user = Auth::user();
        $supervisors = User::whereIn('regras', ['supervisor', 'admin'])->get();
        $setores = Setor::all();


        return view('supervisor.perfil.perfil', compact('user', 'supervisors', 'setores'));
    }




    public function salvarPerfil(Request $request, $id)
    {


            $user = User::find($id);
            //dd($user, $request);

            if($user){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->matricula = $request->matricula;
                $user->supervisor_id = $request->supervisor;
                if ($request->filled('password')) {
                    // Se sim, criptografe a senha e atualize o campo
                    $user->password = Hash::make($request->password);
                }
                //$user->regras = implode($request->regras);
                $user->setor_id = $request->setor;

                $user->save();
            }

            toastr()->success('Perfil atualizado com sucesso');

            return redirect('/supervisor/painel');
        }

}

