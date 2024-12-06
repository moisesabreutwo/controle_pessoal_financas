<!-- Menu principal -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('videos-educacionais') }}">VÍDEOS EDUCACIONAIS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('outros-videos') }}">OUTROS VÍDEOS</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('contratar') }}">COMPRAR</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">CONTATO SUGESTÕES</a>
                </li>
            </ul>
        </div>
    </div>
</nav>