@include('includes.header')

    <div class="container-fluid main-content"> 

        <div class="row">
            <!-- Menu Lateral -->
            @include('admin.includes.menu')

            <!-- Área de Conteúdo -->
            <div class="col-md-9">

                <!-- Exibir mensagem de sucesso -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">  
                        {{ session('success') }}
                    </div>
                @endif

                <h1>Editar Grupo</h1>
                <form action="{{ route('despesasGrupo.update', $despesasGrupo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" name="codigoDespesasGrupo" class="form-control" value="{{ $despesasGrupo->codigoDespesasGrupo }}" maxlength="4" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" name="descricaoDespesasGrupo" class="form-control" value="{{ $despesasGrupo->descricaoDespesasGrupo }}" maxlength="40" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>


@include('includes.footer')
