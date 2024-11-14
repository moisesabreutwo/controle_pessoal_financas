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

            <h1>Lista de Grupos de Receitas</h1>
            <a href="{{ route('receitasGrupo.create') }}" class="btn btn-primary">Criar Novo Grupo</a>

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
                        @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->codigoReceitasGrupo }}</td>
                                <td>{{ $grupo->descricaoReceitasGrupo }}</td>
                                <td>
                                    <a href="{{ route('receitasGrupo.edit', $grupo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('receitasGrupo.destroy', $grupo->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $grupos->links() }}
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
