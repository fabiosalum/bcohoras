<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setor;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index(){

        $user = Auth::user();
        return view('user.painel', compact('user'));

    }

    public function editarPerfil(){

        $user = Auth::user();

        return view('user.perfil.perfil', compact('user'));
    }




    public function salvarPerfil(Request $request, $id)
    {

            $user = User::find($id);
            //dd($user, $request);

            if($user){
                if ($request->filled('name')) {
                    $user->name = $request->name;
                }
                if ($request->filled('email')) {
                    $user->email = $request->email;
                }
                //$user->matricula = $request->matricula;
                //$user->supervisor_id = $request->supervisor;
                if ($request->filled('password')) {
                    // Se sim, criptografe a senha e atualize o campo
                    $user->password = Hash::make($request->password);
                }
                //$user->regras = implode($request->regras);
                //$user->setor_id = $request->setor;

                $user->save();
            }

            toastr()->success('Perfil atualizado com sucesso');

            return redirect('/user/painel');
        }



}
