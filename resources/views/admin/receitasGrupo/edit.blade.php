@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Editar Grupo de Receita</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('receitasGrupo.update', $receitasGrupo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" name="codigoReceitasGrupo" class="form-control" maxlength="4" value="{{ $receitasGrupo->codigoReceitasGrupo }}" required>
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="descricaoReceitasGrupo" class="form-control" maxlength="40" value="{{ $receitasGrupo->descricaoReceitasGrupo }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
