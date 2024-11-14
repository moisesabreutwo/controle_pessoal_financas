@include('includes.header')
    <!-- Conteúdo Principal -->
    <div class="container main-content">
    <h2>Outros Vídeos</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p>Inserir conteúdo...</p>
    


<!-- Inclui o script do reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('includes.footer')
