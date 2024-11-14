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
                    <label>Código:</label>
                    <input type="text" name="codigoDespesasGrupo" maxlength="4" required>
                    
                    <label>Descrição:</label>
                    <input type="text" name="descricaoDespesasGrupo" maxlength="40" required>
                    
                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>


@include('includes.footer')
