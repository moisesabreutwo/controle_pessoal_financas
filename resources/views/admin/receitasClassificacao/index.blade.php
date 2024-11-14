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

            <h1>Lista de Classificações de Receitas</h1>
            <a href="{{ route('receitasClassificacao.create') }}" class="btn btn-primary">Criar Nova Classificação</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classificacoes as $classificacao)
                            <tr>
                                <td>{{ $classificacao->codigoReceitasClassificacao }}</td>
                                <td>{{ $classificacao->descricaoReceitasClassificacao }}</td>
                                <td>
                                    <a href="{{ route('receitasClassificacao.edit', $classificacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('receitasClassificacao.destroy', $classificacao->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $classificacoes->links() }}
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
