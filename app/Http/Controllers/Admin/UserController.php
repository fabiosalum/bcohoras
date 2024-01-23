<?php

namespace App\Http\Controllers\Admin;


use App\Models\Setor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $setores = Setor::all();
        return view('admin.users.create', compact('setores', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'matricula' => $request->matricula,
            'supervisor_id' => $request->supervisor,
            'password' => Hash::make($request->password),
            'regras' => implode($request->regras),
            'setor_id' => $request->setor

        ]);



            return redirect(route('adminuser.index'));


     }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supervisors = User::whereIn('regras', ['supervisor', 'admin'])->get();
        $setores = Setor::all();
        $user = User::find($id);

         return view('admin.users.edit', compact('user', 'setores', 'supervisors'));
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
            if ($request->has('password')) {
                // Se sim, criptografe a senha e atualize o campo
                $user->password = Hash::make($request->password);
            }
            $user->regras = implode($request->regras);
            $user->setor_id = $request->setor;

            $user->save();
        }


        toastr()->success('Usuário atualizado com sucesso');
        return redirect()->route('adminuser.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function delete(string $id)
     {
         $user = User::find($id);
         $user->delete();

         toastr()->success('Usuário deletado com sucesso');
         return redirect(route('adminuser.index'));
     }

     public function destroy(string $id)
    {

    }
}
