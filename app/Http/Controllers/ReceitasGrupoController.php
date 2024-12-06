<?php

namespace App\Http\Controllers;

use App\Models\ReceitasGrupo;
use Illuminate\Http\Request;

class ReceitasGrupoController extends Controller
{
    public function index()
    {
        $grupos = ReceitasGrupo::paginate(10);
        return view('admin.receitasGrupo.index', compact('grupos'));
    }

    public function create()
    {
        return view('admin.receitasGrupo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoReceitasGrupo' => 'required|string|max:4|unique:CPF_receitasGrupo,codigoReceitasGrupo',
            'descricaoReceitasGrupo' => 'required|string|max:40',
        ], [
            'codigoReceitasGrupo.unique' => 'O código informado já está em uso. Por favor, escolha outro.',
        ]);

        ReceitasGrupo::create($request->all());
        return redirect()->route('receitasGrupo.index')->with('success', 'Código Receita Grupo incluído');
    }

    public function edit(ReceitasGrupo $receitasGrupo)
    {
        return view('admin.receitasGrupo.edit', compact('receitasGrupo'));
    }

    public function update(Request $request, ReceitasGrupo $receitasGrupo)
    {
        $request->validate([
            'codigoReceitasGrupo' => 'required|string|max:4|unique:CPF_receitasGrupo,codigoReceitasGrupo,' . $receitasGrupo->id,
            'descricaoReceitasGrupo' => 'required|string|max:40',
        ]);

        $receitasGrupo->update($request->all());
        return redirect()->route('receitasGrupo.index')->with('success', 'Código Receita Grupo alterado');
    }

    public function destroy(ReceitasGrupo $receitasGrupo)
    {
        $receitasGrupo->delete();
        return redirect()->route('receitasGrupo.index')->with('success', 'Código Receita Grupo excluído');
    }
}
