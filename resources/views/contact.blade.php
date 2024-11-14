@include('includes.header')
    <!-- Conteúdo Principal -->
    <div class="container main-content">
    <h2>Formulário de Contato</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf

        <!-- Nome -->
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Telefone -->
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <!-- Mensagem -->
        <div class="form-group">
            <label for="message">Mensagem:</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <!-- reCAPTCHA -->
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


<!-- Inclui o script do reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('includes.footer')
