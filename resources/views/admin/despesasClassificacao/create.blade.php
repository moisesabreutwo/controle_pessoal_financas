@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Criar Nova Classificação de Despesa</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('despesasClassificacao.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" name="codigoDespesasClassificacao" class="form-control" maxlength="2" required>
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="descricaoDespesasClassificacao" class="form-control" maxlength="40" required>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
