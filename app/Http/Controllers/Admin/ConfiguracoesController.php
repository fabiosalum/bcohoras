<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;

class ConfiguracoesController extends Controller
{
    public function index(){

        $config = Configuracoes::find(1);
        return view('admin.configuracao.index', compact('config'));

    }


    public function editar(Request $request){

        $config = Configuracoes::find(1);


        $config->nome = $request->nome;
        $config->save();

        toastr()->success('Cidade atualizada com sucesso.');
        return redirect()->back();

    }
}
