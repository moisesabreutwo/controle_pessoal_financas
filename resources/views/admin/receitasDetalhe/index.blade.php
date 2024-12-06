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

            <h1>Lista de Detalhes de Receitas</h1>
            <a href="{{ route('receitasDetalhe.create') }}" class="btn btn-primary">Criar Novo Detalhe</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Grupo</th>
                            <th>Código Detalhe</th>
                            <th>Descrição Detalhe</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalhes as $detalhe)
                            <tr>
                                <td>{{ $detalhe->grupo->codigoReceitasGrupo }} - {{ $detalhe->grupo->descricaoReceitasGrupo }}</td>
                                <td>{{ $detalhe->codigoReceitasDetalhe }}</td>
                                <td>{{ $detalhe->descricaoReceitasDetalhe }}</td>
                                <td>
                                    <a href="{{ route('receitasDetalhe.edit', $detalhe->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('receitasDetalhe.destroy', $detalhe->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $detalhes->links() }}
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
