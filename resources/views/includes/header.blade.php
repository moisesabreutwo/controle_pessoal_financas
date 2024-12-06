<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/carousel.css" rel="stylesheet">
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <!-- Navbar com Logo, Título e Botões -->
        <nav class="navbar navbar-expand-md navbar-dark navbar-custom">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="{{ $dadosExcep->enderecoLogo }}" alt="Logo">
                    </a>
                    <!-- Título centralizado com subtítulo -->
                    <div class="title-container">
                        <h1 class="title-text">CONTROLE PESSOAL DE FINANÇAS</h1>
                        <p class="subtitle-text">{{ $dadosExcep->conteudoTela }}</p>
                    </div>
                    <!-- Botões -->
                    <div class="btn-group btn-group-custom" role="group">
                            @guest
                                <button type="button" class="btn btn-warning"><a href="{{ route('cliente') }}">QUERO SER CLIENTE</a></button>
                            @endguest
                            
                            <button type="button" class="btn btn-info"><a href="{{ route('restrita') }}">
                                @guest
                                    LOGIN
                                @endguest
                                @auth
                                    ÁREA RESTRITA
                                @endauth
                                
                            </a></button>
                            @auth                               
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item">Sair</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                    </div>
                </div>
                <!-- Data e Hora -->
                <div class="info-box mt-2">
                    <p>Data: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                </div>
            </div>
        </nav>
        @if (Route::currentRouteName() !== 'cliente')
            @include('includes.menu')
        @endif
    </header>