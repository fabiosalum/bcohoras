<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setores = Setor::orderBy('nome', 'asc')->get();
        return view('admin.setores.index', compact('setores'));
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
        $setor = new Setor;
        $setor->nome = $request->nome;
        $setor->save();

        toastr()->success('Setor cadastrado com sucesso.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $setor = Setor::find($id);


        $setor->nome = $request->nome;
        $setor->save();

        toastr()->success('Setor atualizado com sucesso.');
        return redirect()->back();

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

        $setor = Setor::find($id);
        if($setor){

            $setor->delete();

            toastr()->success('Setor deletado com sucesso.');
            return redirect()->back();
        }

        toastr()->error('Setor não encontrado.');
        return redirect()->back();





    }
}
