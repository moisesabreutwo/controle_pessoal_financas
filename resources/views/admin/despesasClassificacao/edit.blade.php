@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Editar Classificação de Despesa</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('despesasClassificacao.update', $despesasClassificacao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" name="codigoDespesasClassificacao" class="form-control" maxlength="2" value="{{ $despesasClassificacao->codigoDespesasClassificacao }}" required>
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="descricaoDespesasClassificacao" class="form-control" maxlength="40" value="{{ $despesasClassificacao->descricaoDespesasClassificacao }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
