<?php

namespace App\Http\Controllers;

use App\Models\ReceitasClassificacao;
use Illuminate\Http\Request;

class ReceitasClassificacaoController extends Controller
{
    public function index()
    {
        $classificacoes = ReceitasClassificacao::paginate(10);
        return view('admin.receitasClassificacao.index', compact('classificacoes'));
    }

    public function create()
    {
        return view('admin.receitasClassificacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoReceitasClassificacao' => 'required|string|max:2|unique:CPF_receitasClassificacao',
            'descricaoReceitasClassificacao' => 'required|string|max:40',
        ]);

        ReceitasClassificacao::create($request->all());
        return redirect()->route('receitasClassificacao.index')->with('success', 'Código Receita Classificação incluído');
    }

    public function edit(ReceitasClassificacao $receitasClassificacao)
    {
        return view('admin.receitasClassificacao.edit', compact('receitasClassificacao'));
    }

    public function update(Request $request, ReceitasClassificacao $receitasClassificacao)
    {
        $request->validate([
            'codigoReceitasClassificacao' => 'required|string|max:2|unique:CPF_receitasClassificacao,codigoReceitasClassificacao,' . $receitasClassificacao->id,
            'descricaoReceitasClassificacao' => 'required|string|max:40',
        ]);

        $receitasClassificacao->update($request->all());
        return redirect()->route('receitasClassificacao.index')->with('success', 'Código Receita Classificação alterado');
    }

    public function destroy(ReceitasClassificacao $receitasClassificacao)
    {
        $receitasClassificacao->delete();
        return redirect()->route('receitasClassificacao.index')->with('success', 'Código Receita Classificação excluído');
    }
}
