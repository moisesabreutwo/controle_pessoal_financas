@include('includes.header')

<!-- Conteúdo Principal -->
<div class="container main-content">
    <h2>Esqueceu sua senha?</h2>

    <p class="mb-4 text-muted">
        {{ __('Esqueceu sua senha? Não tem problema. Informe seu endereço de e-mail e enviaremos um link para redefinição de senha para que você possa escolher uma nova.') }}
    </p>

    <!-- Mensagem de status da sessão -->
    @if (session('status'))
        <div class="alert alert-success mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Botão para envio do link de redefinição de senha -->
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Enviar Link de Redefinição de Senha') }}
            </button>
        </div>
    </form>
</div>

@include('includes.footer')
