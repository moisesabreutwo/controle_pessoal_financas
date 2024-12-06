<?php

namespace App\Http\Controllers;

use App\Models\DadosExcepcionais;
use App\Models\IdentificacaoCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IdentificacaoClienteController extends Controller
{
    public function index()
    {
        $clientes = IdentificacaoCliente::all(); // Recupera todos os clientes
        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('admin.clientes.create');
    }

    public function store(Request $request)
    {
        // Validação
        $data = $request->validate([
            'nomeIdentificacaoCliente' => 'required|max:70',
            'dataNascimentoIdentificacaoCliente' => 'required|date',
            'sexoIdentificacaoCliente' => 'required|max:1',
            'ufResidenciaIdentificacaoCliente' => 'required|max:2',
            'ddiIdentificacaoCliente' => 'required|max:4',
            'dddIdentificacaoCliente' => 'required|max:2',
            'telefoneCelularIdentificacaoCliente' => 'required|max:9',
            'cpfIdentificacaoCliente' => 'nullable|max:11',
            'envioMensagemIdentificacaoCliente' => 'required|max:1',
            'email' => 'required|email|unique:users,email', // Validação para e-mail único
            'password' => 'required|min:8|confirmed',
        ]);

        // Criação do novo usuário
        $user = User::create([
            'name' => $data['nomeIdentificacaoCliente'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Remover campos específicos do User para que não sejam repetidos na criação do cliente
        unset($data['email'], $data['password'], $data['password_confirmation']);

        // Criação do cliente e vinculação com o novo usuário
        $data['user_id'] = $user->id;
        IdentificacaoCliente::create($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente e usuário criados com sucesso!');
    }

    public function edit($id)
    {
        $cliente = IdentificacaoCliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = IdentificacaoCliente::findOrFail($id);
        $user = $cliente->user;
    
        $data = $request->validate([
            'nomeIdentificacaoCliente' => 'required|max:70',
            'dataNascimentoIdentificacaoCliente' => 'required|date',
            'sexoIdentificacaoCliente' => 'required|max:1',
            'ufResidenciaIdentificacaoCliente' => 'required|max:2',
            'ddiIdentificacaoCliente' => 'required|max:4',
            'dddIdentificacaoCliente' => 'required|max:2',
            'telefoneCelularIdentificacaoCliente' => 'required|max:9',
            'cpfIdentificacaoCliente' => 'nullable|max:11',
            'envioMensagemIdentificacaoCliente' => 'required|max:1',
            'email' => 'required|email|unique:users,email,' . $user->id, // Permitir o e-mail do próprio usuário
            'password' => 'nullable|min:8|confirmed', // Senha é opcional ao atualizar
        ]);
    
        // Atualização do usuário
        $user->name = $data['nomeIdentificacaoCliente'];
        $user->email = $data['email'];
        if (!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();
    
        // Remover campos específicos do User para evitar erro de repetição
        unset($data['email'], $data['password'], $data['password_confirmation']);
    
        // Atualizar dados do cliente
        $cliente->update($data);
    
        return redirect()->route('clientes.index')->with('success', 'Cliente e usuário atualizados com sucesso!');
    }
    

    public function destroy($id)
    {
        $cliente = IdentificacaoCliente::findOrFail($id);
        $user = $cliente->user;
    
        // Deleta o cliente e o usuário vinculado
        $cliente->delete();
        $user->delete();
    
        return redirect()->route('clientes.index')->with('success', 'Cliente e usuário removidos com sucesso!');
    }


    public function createSite()
    {
        $dados = DadosExcepcionais::first();
        //dd($dadosExcep);
        return view('cliente', compact('dados'));
    }

    public function storeSite(Request $request)
    {
        // Validação
        $data = $request->validate([
            'nomeIdentificacaoCliente' => 'required|max:70',
            'dataNascimentoIdentificacaoCliente' => 'required|date',
            'sexoIdentificacaoCliente' => 'required|max:1',
            'ufResidenciaIdentificacaoCliente' => 'required|max:2',
            'ddiIdentificacaoCliente' => 'required|max:4',
            'dddIdentificacaoCliente' => 'required|max:2',
            'telefoneCelularIdentificacaoCliente' => 'required|max:9',
            'cpfIdentificacaoCliente' => 'nullable|max:11',
            'envioMensagemIdentificacaoCliente' => 'required|max:1',
            'email' => 'required|email|unique:users,email', // Validação para e-mail único
            'password' => 'required|min:8|confirmed',
        ]);

        // Criação do novo usuário
        $user = User::create([
            'name' => $data['nomeIdentificacaoCliente'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Remover campos específicos do User para que não sejam repetidos na criação do cliente
        unset($data['email'], $data['password'], $data['password_confirmation']);

        // Criação do cliente e vinculação com o novo usuário
        $data['user_id'] = $user->id;
        IdentificacaoCliente::create($data);

        // Mensagem personalizada
        $mensagem = "Prezado(a) {$data['nomeIdentificacaoCliente']}, Após realizado o pagamento, no prazo de 72 horas, as funcionalidades do Sistema Controle pessoal de finanças serão disponibilizadas. Dessa forma, para acessar o Sistema, deve-se utilizar o e-mail cadastrado e a senha que foi digitada.\n\nAcredite nesse seu projeto!";

        return redirect()
            ->route('cliente')
            ->with('popupMessage', $mensagem)
            ->with('success', 'Cadastro realizado com sucesso!');

    }
    
}
