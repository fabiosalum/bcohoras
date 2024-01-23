<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitacoes;
use Illuminate\Http\Request;
use App\Models\User;

class SolicitacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::whereIn('regras', ['user', 'supervisor'])->get();
        return view('admin.lancamentos.index', compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
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

        toastr()->success('Solicitação enviada com sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
