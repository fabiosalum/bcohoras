<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setor;
use App\Models\Solicitacoes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index(){

        $users = User::where('regras', '=', 'user')->get();
        $users_count = User::count();

        $sol_pendentes = Solicitacoes::where('status', '=', 'pendente')->count();
        $sol_aprovadas = Solicitacoes::where('status', '=', 'aprovado')->count();
        $sol_entradas = Solicitacoes::where('regras', '=', 'entrada')->latest('id')->get();
        $sol_saidas = Solicitacoes::where('regras', '=', 'saida')->latest('id')->get();
        return view ('admin.painel', compact('users', 'sol_entradas', 'sol_saidas', 'sol_pendentes', 'sol_aprovadas', 'users_count'));


    }


    public function editarPerfil(){

        $user = Auth::user();
        $supervisors = User::whereIn('regras', ['supervisor', 'admin'])->get();
        $setores = Setor::all();


        return view('admin.perfil.perfil', compact('user', 'supervisors', 'setores'));
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
