@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Criar Novo Detalhe de Despesa</h1>

            <!-- Exibir mensagem de sucesso -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('despesasDetalhe.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Código Grupo:</label>
                    <select name="codigoDespesasGrupo" class="form-control" required>
                        <option value="">Selecione o Grupo</option>
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->codigoDespesasGrupo }}">
                                {{ $grupo->codigoDespesasGrupo }} - {{ $grupo->descricaoDespesasGrupo }}
                            </option>
                        @endforeach
                        @error('codigoDespesasGrupo')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </select>
                </div>

                <div class="form-group">
                    <label>Código Detalhe:</label>
                    <input type="text" name="codigoDespesasDetalhe" class="form-control" maxlength="4" required>
                    @error('codigoDespesasDetalhe')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Descrição Detalhe:</label>
                    <input type="text" name="descricaoDespesasDetalhe" class="form-control" maxlength="40" required>
                    @error('descricaoDespesasDetalhe')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
