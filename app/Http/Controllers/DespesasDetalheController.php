<?php

namespace App\Http\Controllers;

use App\Models\DespesasDetalhe;
use App\Models\DespesasGrupo;
use Illuminate\Http\Request;
use App\Rules\UniqueDespesasDetalhe;

class DespesasDetalheController extends Controller
{
    public function index()
    {
        $detalhes = DespesasDetalhe::with('grupo')
        ->orderBy('codigoDespesasGrupo')
        ->orderBy('codigoDespesasDetalhe')
        ->paginate(10);

        return view('admin.despesasDetalhe.index', compact('detalhes'));
    }

    public function create()
    {
        $grupos = DespesasGrupo::all();
        return view('admin.despesasDetalhe.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoDespesasGrupo' => 'required|string|max:4',
            'codigoDespesasDetalhe' => [
                'required',
                'string',
                'max:4',
                new UniqueDespesasDetalhe($request->codigoDespesasGrupo),
            ],
            'descricaoDespesasDetalhe' => 'required|string|max:40',
        ]);
    
        DespesasDetalhe::create($request->all());
    
        return redirect()->route('despesasDetalhe.index')->with('success', 'Código Despesas Detalhe incluído');
    }

    public function edit(DespesasDetalhe $despesasDetalhe)
    {
        $grupos = DespesasGrupo::all();
        return view('admin.despesasDetalhe.edit', compact('despesasDetalhe', 'grupos'));
    }

    public function update(Request $request, DespesasDetalhe $despesasDetalhe)
    {
        $request->validate([
            'codigoDespesasGrupo' => 'required|string|max:4',
            'codigoDespesasDetalhe' => 'required|string|max:4',
            'descricaoDespesasDetalhe' => 'required|string|max:40',
        ]);

        $despesasDetalhe->update($request->all());
        return redirect()->route('despesasDetalhe.index')->with('success', 'Código Despesas Detalhe alterado');
    }

    public function destroy(DespesasDetalhe $despesasDetalhe)
    {
        $despesasDetalhe->delete();
        return redirect()->route('despesasDetalhe.index')->with('success', 'Código Despesas Detalhe excluído');
    }
}
