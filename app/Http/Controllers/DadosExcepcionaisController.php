<?php

namespace App\Http\Controllers;

use App\Models\DadosExcepcionais;
use Illuminate\Http\Request;

class DadosExcepcionaisController extends Controller
{
    public function index()
    {
        $dado = DadosExcepcionais::first();
        if ($dado) {
            return redirect()->route('dadosExcepcionais.edit', $dado->id);
        }
        return view('admin.dadosExcepcionais.create');
    }

    public function create()
    {
        $dado = DadosExcepcionais::first();
        if ($dado) {
            return redirect()->route('dadosExcepcionais.edit', $dado->id);
        }
        return view('admin.dadosExcepcionais.create');
    }

    public function store(Request $request)
    {
        // Verifica se já existe um registro
        if (DadosExcepcionais::exists()) {
            return redirect()->route('dadosExcepcionais.index')->with('error', 'Apenas um registro é permitido.');
        }
    
        $request->validate([
            'enderecoLogo' => 'required|string|max:100',
            'conteudoTela' => 'required|string|max:30',
            'nomeEmpresa' => 'required|string|max:40',
            'nomeFantasiaEmpresa' => 'required|string|max:40',
            'mensagemPositiva' => 'required|string|max:256',
            'valorDeposito' => 'required|numeric|between:0,9999999999.99',
            'chavePix' => 'required|string|max:50',
            'valorDepositoExtenso' => 'required|string|max:40',
            'moedaReferencia' => 'required|string|max:2',
            'cnpjEmpresa' => 'required|string|max:14',
            'emailContato' => 'required|string|max:50',
            'conteudoFoto' => 'required|string|max:30',
        ]);
    
        DadosExcepcionais::create($request->all());
        return redirect()->route('dadosExcepcionais.index')->with('success', 'Registro criado com sucesso.');
    }
    
    public function edit($id)
    {
        $dadosExcepcionais = DadosExcepcionais::findOrFail($id);
        return view('admin.dadosExcepcionais.edit', compact('dadosExcepcionais'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'enderecoLogo' => 'required|string|max:100',
            'conteudoTela' => 'required|string|max:30',
            'conteudoFoto' => 'required|string|max:30',
            'nomeEmpresa' => 'required|string|max:40',
            'nomeFantasiaEmpresa' => 'required|string|max:40',
            'valorDeposito' => 'required|numeric|between:0,99999999.99',
            'valorDepositoExtenso' => 'required|string|max:40',
            'moedaReferencia' => 'required|string|max:2',
            'cnpjEmpresa' => 'required|string|size:14',
            'chavePix' => 'required|string|max:50',
            'emailContato' => 'required|email|max:50',
            'mensagemPositiva' => 'required|string|max:256',
        ]);
    
        // Atualize o registro no banco de dados
        $dadosExcepcionais = DadosExcepcionais::findOrFail($id);
        $dadosExcepcionais->update($request->all());
    
        return redirect()->route('dadosExcepcionais.edit', $dadosExcepcionais->id)
                         ->with('success', 'Dados excepcionais atualizados com sucesso.');
    }

    public function destroy(DadosExcepcionais $dadosExcepcionais)
    {
        $dadosExcepcionais->delete();
        return redirect()->route('dadosExcepcionais.index')->with('success', 'Registro excluído com sucesso.');
    }
}
