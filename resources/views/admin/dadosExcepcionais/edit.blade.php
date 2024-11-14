@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            <h1>Editar Dados Excepcionais</h1>

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

            <!-- Exibir erros de validação globais -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('dadosExcepcionais.update', $dadosExcepcionais->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Endereço da LOGO -->
                <div class="form-group">
                    <label>Endereço da LOGO:</label>
                    <input type="text" name="enderecoLogo" class="form-control" value="{{ $dadosExcepcionais->enderecoLogo }}" maxlength="100" required>
                </div>

                <!-- Linha com dois campos menores lado a lado -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Conteúdo Tela Principal:</label>
                            <input type="text" name="conteudoTela" class="form-control" value="{{ $dadosExcepcionais->conteudoTela }}" maxlength="30" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Conteúdo Foto:</label>
                            <input type="text" name="conteudoFoto" class="form-control" value="{{ $dadosExcepcionais->conteudoFoto }}" maxlength="30" required>
                        </div>
                    </div>
                </div>

                <!-- Nome Empresa e Nome Fantasia da Empresa -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome da Empresa:</label>
                            <input type="text" name="nomeEmpresa" class="form-control" value="{{ $dadosExcepcionais->nomeEmpresa }}" maxlength="40" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome Fantasia da Empresa:</label>
                            <input type="text" name="nomeFantasiaEmpresa" class="form-control" value="{{ $dadosExcepcionais->nomeFantasiaEmpresa }}" maxlength="40" required>
                        </div>
                    </div>
                </div>

                <!-- Valor do Depósito e Valor por Extenso -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valor do Depósito:</label>
                            <input type="number" name="valorDeposito" step="0.01" class="form-control" value="{{ $dadosExcepcionais->valorDeposito }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Valor do Depósito por Extenso:</label>
                            <input type="text" name="valorDepositoExtenso" class="form-control" value="{{ $dadosExcepcionais->valorDepositoExtenso }}" maxlength="40" required>
                        </div>
                    </div>
                </div>

                <!-- Moeda de Referência e CNPJ da Empresa -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Moeda de Referência:</label>
                            <input type="text" name="moedaReferencia" class="form-control" value="{{ $dadosExcepcionais->moedaReferencia }}" maxlength="2" required>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>CNPJ da Empresa:</label>
                            <input type="text" name="cnpjEmpresa" class="form-control" value="{{ $dadosExcepcionais->cnpjEmpresa }}" maxlength="14" required>
                        </div>
                    </div>
                </div>

                <!-- Chave PIX e Email para Contato -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Chave PIX:</label>
                            <input type="text" name="chavePix" class="form-control" value="{{ $dadosExcepcionais->chavePix }}" maxlength="50" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email para Contato:</label>
                            <input type="email" name="emailContato" class="form-control" value="{{ $dadosExcepcionais->emailContato }}" maxlength="50" required>
                        </div>
                    </div>
                </div>

                <!-- Mensagem Positiva -->
                <div class="form-group">
                    <label>Mensagem Positiva:</label>
                    <textarea name="mensagemPositiva" class="form-control" maxlength="256" required>{{ $dadosExcepcionais->mensagemPositiva }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
