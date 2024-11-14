@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Editar Detalhe de Receita</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('receitasDetalhe.update', $receitasDetalhe->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Código Grupo:</label>
                    <select name="codigoReceitasGrupo" class="form-control" required>
                        <option value="">Selecione o Grupo</option>
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->codigoReceitasGrupo }}" 
                                {{ $receitasDetalhe->codigoReceitasGrupo == $grupo->codigoReceitasGrupo ? 'selected' : '' }}>
                                {{ $grupo->codigoReceitasGrupo }} - {{ $grupo->descricaoReceitasGrupo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Código Detalhe:</label>
                    <input type="text" name="codigoReceitasDetalhe" class="form-control" maxlength="4" value="{{ $receitasDetalhe->codigoReceitasDetalhe }}" required>
                </div>

                <div class="form-group">
                    <label>Descrição Detalhe:</label>
                    <input type="text" name="descricaoReceitasDetalhe" class="form-control" maxlength="40" value="{{ $receitasDetalhe->descricaoReceitasDetalhe }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
