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


                <h1>Criar Novo Grupo</h1>
                <form action="{{ route('despesasGrupo.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" name="codigoDespesasGrupo" class="form-control" maxlength="4" required>
                        @error('codigoDespesasGrupo')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Descrição:</label>
                        <input type="text" name="descricaoDespesasGrupo" class="form-control" maxlength="40" required>
                        @error('descricaoDespesasGrupo')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>


@include('includes.footer')
