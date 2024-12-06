<?php

namespace App\Http\Controllers;

use App\Models\DespesasGrupo;
use Illuminate\Http\Request;

class DespesasGrupoController extends Controller
{
    public function index()
    {
        $grupos = DespesasGrupo::paginate(10);
        return view('admin.despesasGrupo.index', compact('grupos'));
    }

    public function create()
    {
        return view('admin.despesasGrupo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoDespesasGrupo' => 'required|string|max:4|unique:CPF_despesasGrupo,codigoDespesasGrupo',
            'descricaoDespesasGrupo' => 'required|string|max:40',
        ], [
            'codigoDespesasGrupo.unique' => 'O código informado já está em uso. Por favor, escolha outro.',
        ]);

        DespesasGrupo::create($request->all());
        return redirect()->route('despesasGrupo.index')->with('success', 'Código Despesas Grupo incluído');
    }

    public function edit(DespesasGrupo $despesasGrupo)
    {
        return view('admin.despesasGrupo.edit', compact('despesasGrupo'));
    }

    public function update(Request $request, DespesasGrupo $despesasGrupo)
    {
        $request->validate([
            'codigoDespesasGrupo' => 'required|string|max:4',
            'descricaoDespesasGrupo' => 'required|string|max:40',
        ]);

        $despesasGrupo->update($request->all());
        return redirect()->route('despesasGrupo.index')->with('success', 'Código Despesas Grupo alterado');
    }

    public function destroy(DespesasGrupo $despesasGrupo)
    {
        $despesasGrupo->delete();
        return redirect()->route('despesasGrupo.index')->with('success', 'Código Despesas Grupo excluído');
    }
}
