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

            <h1>Lista de Dados Excepcionais</h1>
            <a href="{{ route('dadosExcepcionais.create') }}" class="btn btn-primary">Criar Novo Registro</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome Empresa</th>
                            <th>CNPJ</th>
                            <th>Valor Depósito</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados as $dado)
                            <tr>
                                <td>{{ $dado->nomeEmpresa }}</td>
                                <td>{{ $dado->cnpjEmpresa }}</td>
                                <td>{{ $dado->valorDeposito }}</td>
                                <td>
                                    <a href="{{ route('dadosExcepcionais.edit', $dado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('dadosExcepcionais.destroy', $dado->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dados->links() }}
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
