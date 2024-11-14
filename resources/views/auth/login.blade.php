@include('includes.header')

<!-- Conteúdo Principal -->
<div class="container main-content">
    <h2>Login</h2>

    <!-- Mensagem de status da sessão -->
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group mt-3">
            <label for="email">E-mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group mt-3">
            <label for="password">Senha</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="form-check mt-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="remember_me">Manter logado</label>
        </div>

        <!-- Botões e link para redefinir senha -->
        <div class="d-flex justify-content-end align-items-center mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-underline me-3">
                    Esqueceu sua senha?
                </a>
            @endif

            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </form>
</div>

@include('includes.footer')
