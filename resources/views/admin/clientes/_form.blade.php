<div class="container">
    <!-- Exibe mensagens de erro de validação -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Nome -->
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nomeIdentificacaoCliente" class="form-control"
               value="{{ old('nomeIdentificacaoCliente', $cliente->nomeIdentificacaoCliente ?? '') }}" required>
    </div>

    <!-- E-mail (no caso, está na tabela de usuários) -->
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $cliente->user->email ?? '') }}" required>
    </div>

    <!-- Mês/Ano de Nascimento -->
    <div class="form-group">
        <label>Data de Nascimento:</label>
        <input type="date" name="dataNascimentoIdentificacaoCliente" class="form-control"
               value="{{ old('dataNascimentoIdentificacaoCliente', $cliente->dataNascimentoIdentificacaoCliente ?? '') }}" required>
    </div>

    <!-- Sexo -->
    <div class="form-group">
        <label>Sexo:</label>
        <select name="sexoIdentificacaoCliente" class="form-control" required>
            <option value="">Selecione</option>
            <option value="M" {{ old('sexoIdentificacaoCliente', $cliente->sexoIdentificacaoCliente ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexoIdentificacaoCliente', $cliente->sexoIdentificacaoCliente ?? '') == 'F' ? 'selected' : '' }}>Feminino</option>
        </select>
    </div>

    <!-- UF -->
    <div class="form-group">
        <label>UF:</label>
        <select name="ufResidenciaIdentificacaoCliente" class="form-control" required>
            <option value="">Selecione a UF</option>
            @foreach(config('ufs') as $sigla => $nome)
                <option value="{{ $sigla }}" {{ old('ufResidenciaIdentificacaoCliente', $cliente->ufResidenciaIdentificacaoCliente ?? 'RJ') == $sigla ? 'selected' : '' }}>
                    {{ $nome }} ({{ $sigla }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- DDI -->
    <div class="form-group">
        <label>DDI:</label>
        <select name="ddiIdentificacaoCliente" class="form-control" required>
            <option value="">Selecione o DDI</option>
            @foreach(config('ddis') as $codigo => $pais)
                <option value="{{ $codigo }}" {{ old('ddiIdentificacaoCliente', $cliente->ddiIdentificacaoCliente ?? '+55') == $codigo ? 'selected' : '' }}>
                    {{ $pais }} ({{ $codigo }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- DDD e Telefone -->
    <div class="form-group" style="display: flex; gap: 1rem;">
        <div style="flex: 1;">
            <label>DDD:</label>
            <input type="text" name="dddIdentificacaoCliente" class="form-control" maxlength="2"
                   value="{{ old('dddIdentificacaoCliente', $cliente->dddIdentificacaoCliente ?? '') }}" required>
        </div>
        <div style="flex: 1;">
            <label>Telefone:</label>
            <input type="text" name="telefoneCelularIdentificacaoCliente" class="form-control" maxlength="9"
                   value="{{ old('telefoneCelularIdentificacaoCliente', $cliente->telefoneCelularIdentificacaoCliente ?? '') }}" required>
        </div>
    </div>

    <!-- CPF (opcional) -->
    <div class="form-group">
        <label>CPF:</label>
        <input type="text" name="cpfIdentificacaoCliente" class="form-control" maxlength="11"
               value="{{ old('cpfIdentificacaoCliente', $cliente->cpfIdentificacaoCliente ?? '') }}">
    </div>

    <!-- Envio de Mensagens (Alertas) -->
    <div class="form-group">
        <label>Envio de Mensagens (Alertas):</label>
        <select name="envioMensagemIdentificacaoCliente" class="form-control" required>
            <option value="">Selecione</option>
            <option value="S" {{ old('envioMensagemIdentificacaoCliente', $cliente->envioMensagemIdentificacaoCliente ?? '') == 'S' ? 'selected' : '' }}>Sim</option>
            <option value="N" {{ old('envioMensagemIdentificacaoCliente', $cliente->envioMensagemIdentificacaoCliente ?? '') == 'N' ? 'selected' : '' }}>Não</option>
        </select>
    </div>

    <!-- Senha -->
    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="password" class="form-control" minlength="8" required>
    </div>

    <!-- Confirmação de Senha -->
    <div class="form-group">
        <label>Confirmação de Senha:</label>
        <input type="password" name="password_confirmation" class="form-control" minlength="8" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($cliente) ? 'Atualizar' : 'Cadastrar' }}</button>
</div>
