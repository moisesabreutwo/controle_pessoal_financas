<?php

namespace App\Http\Controllers;

use App\Models\ReceitasDetalhe;
use App\Models\ReceitasGrupo;
use Illuminate\Http\Request;
use App\Rules\UniqueReceitasDetalhe;


class ReceitasDetalheController extends Controller
{
    public function index()
    {
        $detalhes = ReceitasDetalhe::with('grupo')
        ->orderBy('codigoReceitasGrupo')
        ->orderBy('codigoReceitasDetalhe')
        ->paginate(10);
        return view('admin.receitasDetalhe.index', compact('detalhes'));
    }

    public function create()
    {
        $grupos = ReceitasGrupo::all();
        return view('admin.receitasDetalhe.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoReceitasGrupo' => 'required|string|max:4',
            'codigoReceitasDetalhe' => [
                'required',
                'string',
                'max:4',
                new UniqueReceitasDetalhe($request->codigoReceitasGrupo),
            ],
            'descricaoReceitasDetalhe' => 'required|string|max:40',
        ]);
    
        ReceitasDetalhe::create($request->all());
    
        return redirect()->route('receitasDetalhe.index')->with('success', 'Código Receita Detalhe incluído');
    }

    public function edit(ReceitasDetalhe $receitasDetalhe)
    {
        $grupos = ReceitasGrupo::all();
        return view('admin.receitasDetalhe.edit', compact('receitasDetalhe', 'grupos'));
    }

    public function update(Request $request, ReceitasDetalhe $receitasDetalhe)
    {
        $request->validate([
            'codigoReceitasGrupo' => 'required|string|max:4',
            'codigoReceitasDetalhe' => 'required|string|max:4',
            'descricaoReceitasDetalhe' => 'required|string|max:40',
        ]);

        $receitasDetalhe->update($request->all());
        return redirect()->route('receitasDetalhe.index')->with('success', 'Código Receita Detalhe alterado');
    }

    public function destroy(ReceitasDetalhe $receitasDetalhe)
    {
        $receitasDetalhe->delete();
        return redirect()->route('receitasDetalhe.index')->with('success', 'Código Receita Detalhe excluído');
    }
}
