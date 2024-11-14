@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Criar Configurações Globais</h1>

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('dadosExcepcionais.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Endereço da LOGO:</label>
                    <input type="text" name="enderecoLogo" class="form-control" maxlength="100" required>
                </div>

                <div class="form-group">
                    <label>Conteúdo Tela Principal:</label>
                    <input type="text" name="conteudoTela" class="form-control" maxlength="30" required>
                </div>

                <div class="form-group">
                    <label>Conteúdo Foto:</label>
                    <input type="text" name="conteudoFoto" class="form-control" maxlength="30" required>
                </div>

                <div class="form-group">
                    <label>Nome da Empresa:</label>
                    <input type="text" name="nomeEmpresa" class="form-control" maxlength="40" required>
                </div>

                <div class="form-group">
                    <label>Nome Fantasia da Empresa:</label>
                    <input type="text" name="nomeFantasiaEmpresa" class="form-control" maxlength="40" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CNPJ da Empresa:</label>
                            <input type="text" name="cnpjEmpresa" class="form-control" maxlength="14" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail para Contato:</label>
                            <input type="email" name="emailContato" class="form-control" maxlength="50" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Valor do Depósito:</label>
                    <input type="number" name="valorDeposito" class="form-control" step="0.01" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Moeda de Referência:</label>
                            <input type="text" name="moedaReferencia" class="form-control" maxlength="2" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valor do Depósito por Extenso:</label>
                            <input type="text" name="valorDepositoExtenso" class="form-control" maxlength="40" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Chave PIX:</label>
                    <input type="text" name="chavePix" class="form-control" maxlength="50" required>
                </div>

                <div class="form-group">
                    <label>Mensagem Positiva:</label>
                    <textarea name="mensagemPositiva" class="form-control" rows="3" maxlength="256" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
