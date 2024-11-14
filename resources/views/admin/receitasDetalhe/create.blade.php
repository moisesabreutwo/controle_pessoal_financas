@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Criar Novo Detalhe de Receita</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('receitasDetalhe.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Código Grupo:</label>
                    <select name="codigoReceitasGrupo" class="form-control" required>
                        <option value="">Selecione o Grupo</option>
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->codigoReceitasGrupo }}">
                                {{ $grupo->codigoReceitasGrupo }} - {{ $grupo->descricaoReceitasGrupo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Código Detalhe:</label>
                    <input type="text" name="codigoReceitasDetalhe" class="form-control" maxlength="4" required>
                </div>

                <div class="form-group">
                    <label>Descrição Detalhe:</label>
                    <input type="text" name="descricaoReceitasDetalhe" class="form-control" maxlength="40" required>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
