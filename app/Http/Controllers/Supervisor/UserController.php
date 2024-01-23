<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $supervisor = Auth::user();
            $users = $supervisor->subordinados;

            return view('supervisor.users.index', compact('users'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $users = User::all();
            $setores = Setor::all();
            return view('supervisor.users.create', compact('setores', 'users'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->matricula = $request->matricula;
            $user->supervisor_id = $request->supervisor;
            $user->password = Hash::make($request->password);
            $user->regras = implode($request->regras);
            $user->setor_id = $request->setor;

            $user->save();
            toastr()->success('Usuário Cadastrado com sucesso');
            return redirect(route('usuarios.index'));

        }



        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $supervisors = User::whereIn('regras', ['supervisor', 'admin'])->get();
            $setores = Setor::all();
            $user = User::find($id);

             return view('supervisor.users.edit', compact('user', 'setores', 'supervisors'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, $id)
        {


            $user = User::find($id);

            if($user){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->matricula = $request->matricula;
                $user->supervisor_id = $request->supervisor;
                if ($request->filled('password')) {
                    // Se sim, criptografe a senha e atualize o campo
                    $user->password = Hash::make($request->password);
                }
                $user->regras = implode($request->regras);
                $user->setor_id = $request->setor;

                $user->save();
            }

            toastr()->success('Usuário atualizado com sucesso');
            return redirect('/usuarios');
        }

        /**
         * Remove the specified resource from storage.
         */

         public function delete(string $id)
         {
             $user = User::find($id);
             $user->delete();

             toastr()->success('Usuário deletado com sucesso');
             return redirect('/usuarios');
         }

}
