@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <h2>Lista de Clientes</h2>

            <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Adicionar Novo Cliente</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Sexo</th>
                        <th>UF</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nomeIdentificacaoCliente }}</td>
                            <td>{{ \Carbon\Carbon::parse($cliente->dataNascimentoIdentificacaoCliente)->format('m/Y') }}</td>
                            <td>{{ $cliente->sexoIdentificacaoCliente }}</td>
                            <td>{{ $cliente->ufResidenciaIdentificacaoCliente }}</td>
                            <td>({{ $cliente->dddIdentificacaoCliente }}) {{ $cliente->telefoneCelularIdentificacaoCliente }}</td>
                            <td>{{ $cliente->cpfIdentificacaoCliente }}</td>
                            <td>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.footer')
