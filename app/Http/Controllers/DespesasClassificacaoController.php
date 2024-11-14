<?php

namespace App\Http\Controllers;

use App\Models\DespesasClassificacao;
use Illuminate\Http\Request;

class DespesasClassificacaoController extends Controller
{
    public function index()
    {
        $classificacoes = DespesasClassificacao::paginate(10);
        return view('admin.despesasClassificacao.index', compact('classificacoes'));
    }

    public function create()
    {
        return view('admin.despesasClassificacao.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoDespesasClassificacao' => 'required|string|max:2|unique:CPF_despesasClassificacao',
            'descricaoDespesasClassificacao' => 'required|string|max:40',
        ]);

        DespesasClassificacao::create($request->all());
        return redirect()->route('despesasClassificacao.index')->with('success', 'Código Despesa Classificação incluído');
    }

    public function edit(DespesasClassificacao $despesasClassificacao)
    {
        return view('admin.despesasClassificacao.edit', compact('despesasClassificacao'));
    }

    public function update(Request $request, DespesasClassificacao $despesasClassificacao)
    {
        $request->validate([
            'codigoDespesasClassificacao' => 'required|string|max:2|unique:CPF_despesasClassificacao,codigoDespesasClassificacao,' . $despesasClassificacao->id,
            'descricaoDespesasClassificacao' => 'required|string|max:40',
        ]);

        $despesasClassificacao->update($request->all());
        return redirect()->route('despesasClassificacao.index')->with('success', 'Código Despesa Classificação alterado');
    }

    public function destroy(DespesasClassificacao $despesasClassificacao)
    {
        $despesasClassificacao->delete();
        return redirect()->route('despesasClassificacao.index')->with('success', 'Código Despesa Classificação excluído');
    }
}
