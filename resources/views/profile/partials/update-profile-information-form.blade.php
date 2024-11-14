<section>
    <!-- Cabeçalho da seção -->
    <header class="mb-4">
        <h2 class="h4 text-dark">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="text-muted">
            {{ __("Atualize as informações do perfil e o endereço de e-mail da sua conta.") }}
        </p>
    </header>

    <!-- Formulário para reenvio de verificação de e-mail -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: none;">
        @csrf
    </form>

    <!-- Formulário de atualização do perfil -->
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Campo de Nome -->
        <div class="form-group">
            <label for="name" class="form-label">{{ __('Nome') }}</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @if ($errors->has('name'))
                <div class="alert alert-danger mt-2">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Campo de Email -->
        <div class="form-group mt-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @if ($errors->has('email'))
                <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
            @endif

            <!-- Verificação de Email -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted">
                        {{ __('Seu endereço de e-mail não foi verificado.') }}
                        <button form="send-verification" class="btn btn-link p-0 text-primary">
                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Botão de salvar -->
        <div class="d-flex align-items-center gap-4 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>

            <!-- Mensagem de sucesso após atualização -->
            @if (session('status') === 'profile-updated')
                <p class="text-success mb-0 ms-3">
                    {{ __('Salvo.') }}
                </p>
            @endif
        </div>
    </form>
</section>
