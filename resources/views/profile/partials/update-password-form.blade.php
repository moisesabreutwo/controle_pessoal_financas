<section>
    <!-- Cabeçalho da Seção -->
    <header class="mb-4">
        <h2 class="h4 text-dark">
            {{ __('Atualizar Senha') }}
        </h2>

        <p class="text-muted">
            {{ __('Certifique-se de que sua conta está usando uma senha longa e aleatória para permanecer segura.') }}
        </p>
    </header>

    <!-- Formulário de atualização de senha -->
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Campo de Senha Atual -->
        <div class="form-group">
            <label for="update_password_current_password" class="form-label">{{ __('Senha Atual') }}</label>
            <input type="password" id="update_password_current_password" name="current_password" class="form-control" autocomplete="current-password">
            @if ($errors->updatePassword->has('current_password'))
                <div class="alert alert-danger mt-2">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <!-- Campo de Nova Senha -->
        <div class="form-group mt-3">
            <label for="update_password_password" class="form-label">{{ __('Nova Senha') }}</label>
            <input type="password" id="update_password_password" name="password" class="form-control" autocomplete="new-password">
            @if ($errors->updatePassword->has('password'))
                <div class="alert alert-danger mt-2">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <!-- Campo de Confirmação de Nova Senha -->
        <div class="form-group mt-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmar Senha') }}</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="alert alert-danger mt-2">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <!-- Botão de Salvar e Mensagem de Sucesso -->
        <div class="d-flex align-items-center gap-4 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>

            @if (session('status') === 'password-updated')
                <p class="text-success mb-0 ms-3">
                    {{ __('Salvo.') }}
                </p>
            @endif
        </div>
    </form>
</section>
